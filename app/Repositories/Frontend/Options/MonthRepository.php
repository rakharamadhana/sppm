<?php


namespace App\Repositories\Frontend\Options;

use App\Exceptions\GeneralException;
use App\Models\Options\Month;
use App\Repositories\BaseRepository;

class MonthRepository extends BaseRepository
{
    /**
     * JournalRepository constructor.
     * @param Month $model
     */
    public function __construct(Month $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model::create([
            'month' => $data['month'],
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
    public function update($id, array $input)
    {
        $month = $this->getById($id);
        $month->month = $input['month'];

        return $month->save();
    }

    /**
     * @param array $request
     * @return array|\Illuminate\Database\Eloquent\Builder
     */
    public function filter(array $request)
    {
        $month = $request['month'];

        /** @var array $query */
        return $this->model::query()->where('month', $month)->get();
    }
}
