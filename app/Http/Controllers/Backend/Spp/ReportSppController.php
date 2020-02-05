<?php

namespace App\Http\Controllers\Backend\Spp;

use App\Http\Controllers\Controller;
use App\Models\Options\Month;
use App\Models\Options\Year;
use App\Http\Requests\Frontend\Spp\ReportSppRequest;
use App\Models\Spp\Journal;
use App\Repositories\Frontend\Spp\JournalRepository;

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
     * @param JournalRepository $journalRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(JournalRepository $journalRepository)
    {
        $years = $this->years;

        $months = $this->months;

        $journals = $journalRepository->sumTotalEachMonth(date('Y'));

        $total = array_sum($journals);

        return view('backend.admin.spp.report',
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

        $journals = $journalRepository->sumTotalEachMonth($yearFilter);

        $total = array_sum($journals);

        return view('backend.admin.spp.report',
            [
                'years'=>$years,
                'months'=>$months,
                'journals'=>$journals,
                'total'=>$total
            ]);
    }
}
