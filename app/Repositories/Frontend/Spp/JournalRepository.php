<?php

namespace App\Repositories\Frontend\Spp;

use App\Exceptions\GeneralException;
use App\Models\Options\Month;
use App\Models\Spp\Journal;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 * Class JournalRepository
 * @package App\Repositories\Frontend\Spp
 */
class JournalRepository extends BaseRepository
{
    /**
     * JournalRepository constructor.
     * @param Journal $model
     */
    public function __construct(Journal $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        //dd($data);
        $receipt = $this->upload($data, $data['receipt']);
        $form = $this->upload($data, $data['form']);

        return $this->model::create([
            'user_id' => $data['user_id'],
            'code' => $data['code'],
            'year' => $data['year'],
            'month' => $data['month'],
            'amount' => $data['amount'],
            'receipt' => $receipt,
            'form' => $form,
            'status' => 'Pending',
        ]);
    }

    /**
     * @param $id
     * @param array $input
     * @param $receipt
     * @param $form
     * @return bool
     * @throws GeneralException
     */
    public function update($id, array $input, $receipt, $form)
    {
        $journal = $this->getById($id);
        $journal->code = $input['code'];
        $journal->year = $input['year'];
        $journal->month = $input['month'];
        $journal->amount = $input['amount'];

        // Upload profile image if necessary
        if ($receipt) {
            $journal->avatar_location = $receipt->store('/avatars', 'public');
        } else {
            // No image being passed
            if ($input['avatar_type'] === 'storage') {
                // If there is no existing image
                if (auth()->user()->avatar_location === '') {
                    throw new GeneralException('You must supply a profile image.');
                }
            } else {
                // If there is a current image, and they are not using it anymore, get rid of it
                if (auth()->user()->avatar_location !== '') {
                    Storage::disk('public')->delete(auth()->user()->avatar_location);
                }

                $journal->avatar_location = null;
            }
        }

        $journal->status = $input['status'];

        return $journal->save();
    }

    /**
     * @param $id
     * @param string $status
     * @return bool
     */
    public function updateStatus($id, string $status)
    {
        $journal = $this->getById($id);
        $journal->status = $status;

        //dd($journal);
        return $journal->save();
    }

    /**
     * @param array $meta
     * @param $file
     * @return string|string
     */
    public function upload(array $meta, $file){
        // File Target Folder Name
        $uploadFolder = 'public/spp/'.$meta['year']."/".$meta['month'];

        // File Name
        $fileName = $meta['year'].'_'.$meta['month'].'_'.$meta['user_id'].'_'.$meta['user_name']."_".$file->getClientOriginalName();

        // Upload, Rename, and Move File
        Storage::putFileAs($uploadFolder, $file, $fileName);

        /** @var string $fileName */
        return $fileName;
    }

    /**
     * @return array
     */
    public function sumTotalEachMonth(string $year){

        $months = Month::all()->pluck('month','id');

        foreach($months as $keyMonth => $month){

            // Mengambil sums amount tiap bulan
            $journal[$month] = Journal::select(DB::raw('sum(amount) as total'))
                ->groupBy('month')
                ->where('status','Accepted')
                ->where('month',$month)
                ->where('year',$year)
                ->pluck('total')
                ->first();


        }

        /** @var array $journal */
        return $journal;
    }

    /**
     * @param array $request
     * @return array|\Illuminate\Database\Eloquent\Builder
     */
    public function filter(array $request)
    {
        $month = $request['month'];
        $year = $request['year'];
        $status = $request['status'];

        $journals = $this->model::query()
            ->when($month, function ($query, $month) {
                return $query->where('month', $month);
            })
            ->when($year, function ($query, $year) {
                return $query->where('year', $year);
            })
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->get();

        /** @var array $query */
        //dd($journals);
        return $journals;
    }

    public function getByUserId(int $user_id){
        $journals = $this->model::query()
            ->where('user_id', $user_id)
            ->get();

        return $journals;
    }
}
