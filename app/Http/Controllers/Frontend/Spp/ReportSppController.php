<?php

namespace App\Http\Controllers\Frontend\Spp;

use App\Http\Controllers\Controller;
use App\Http\Requests\Spp\ReportSppRequest;
use App\Models\Options\Month;
use App\Models\Options\Year;
use App\Models\Spp\Journal;
use App\Repositories\Spp\JournalRepository;
use Illuminate\Http\Request;

/**
 * Class ReportSppController
 * @package App\Http\Controllers\Frontend\Spp
 */
class ReportSppController extends Controller
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
     * ReportSppController constructor.
     */
    public function __construct()
    {
        $this->years = Year::all()->pluck('year','year');

        $this->months = Month::all()->pluck('month','id');
    }

    /**
     * @param Request $request
     * @param JournalRepository $journalRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, JournalRepository $journalRepository)
    {
        $years = $this->years;

        $months = $this->months;

        $user_id = $request->session()->get('user_id');

        if($user_id == 1){
            $journals = $journalRepository->sumTotalEachMonth(date('Y'));
        }else{
            $journals = $journalRepository->sumTotalEachMonthWithUserId($user_id, date('Y'));
        }

        $total = array_sum($journals);

        return view('frontend.user.spp.report',
            [
                'years'=>$years,
                'months'=>$months,
                'journals'=>$journals,
                'total'=>$total
            ]);
    }

    public function filter(ReportSppRequest $request, JournalRepository $journalRepository)
    {
        $years = $this->years;

        $months = $this->months;

        $yearFilter = $request->input('year');

        $user_id = $request->session()->get('user_id');

        if($user_id == 1){
            $journals = $journalRepository->sumTotalEachMonth($yearFilter);
        }else{
            $journals = $journalRepository->sumTotalEachMonthWithUserId($user_id, $yearFilter);
        }

        $total = array_sum($journals);

        return view('frontend.user.spp.report',
            [
                'years'=>$years,
                'months'=>$months,
                'journals'=>$journals,
                'total'=>$total
            ]);
    }
}
