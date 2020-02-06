<?php

namespace App\Http\Controllers\Backend\Spp;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Spp\JournalSppRequest;
use App\Models\Options\Month;
use App\Models\Options\Year;
use App\Repositories\Frontend\Spp\JournalRepository;
use Illuminate\Http\Request;

/**
 * Class JournalSppController
 * @package App\Http\Controllers\Frontend\Spp
 */
class JournalSppController extends Controller
{
    /**
     * @var \Illuminate\Support\Collection
     */
    protected $years;

    /**
     * @var \Illuminate\Support\Collection
     */
    private $months;
    /**
     * @var array
     */
    private $status;

    /**
     * JournalSppController constructor.
     */
    public function __construct()
    {
        $this->years = Year::all()->pluck('year','year');

        $this->months = Month::all()->pluck('month','month');

        $this->status = [
            'Pending'=>'Pending',
            'Accepted'=>'Diterima',
            'Rejected'=>'Ditolak'
        ];
    }

    /**
     * @param JournalRepository $journalRepository
     * @param $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, JournalRepository $journalRepository)
    {
        $user_id = $request->session()->get('user_id');

        if($user_id == 1){
            $journals = $journalRepository->get();
        }else{
            $journals = $journalRepository->getByUserId($user_id);
        }

        return view('backend.admin.spp.journal',
            [
                'years'=>$this->years,
                'months'=>$this->months,
                'status'=>$this->status,
                'journals'=>$journals
            ]);
    }

    /**
     * @param JournalSppRequest $request
     * @param JournalRepository $journalRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function filter(JournalSppRequest $request, JournalRepository $journalRepository)
    {
        //dd($request->input());

        $journals = $journalRepository->filter($request->input());

        //dd($journals);

        return view('backend.admin.spp.journal',
            [
                'years'=>$this->years,
                'months'=>$this->months,
                'status'=>$this->status,
                'journals'=>$journals
            ]);
    }

    /**
     * @param $id
     * @param JournalRepository $journalRepository
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function pending($id, JournalRepository $journalRepository)
    {
        $journalRepository->updateStatus($id, 'Pending');

        return redirect(route('admin.spp.journal'));
    }

    /**
     * @param $id
     * @param JournalRepository $journalRepository
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function accept($id, JournalRepository $journalRepository)
    {
        $journalRepository->updateStatus($id, 'Accepted');

        return redirect(route('admin.spp.journal'));
    }

    /**
     * @param $id
     * @param JournalRepository $journalRepository
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function reject($id, JournalRepository $journalRepository)
    {
        $journalRepository->updateStatus($id, 'Rejected');

        return redirect(route('admin.spp.journal'));
    }
}
