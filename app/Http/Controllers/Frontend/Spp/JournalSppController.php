<?php

namespace App\Http\Controllers\Frontend\Spp;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Spp\JournalSppRequest;
use App\Models\Options\Month;
use App\Models\Options\Year;
use App\Repositories\Frontend\Spp\JournalRepository;
use Illuminate\Support\Facades\DB;
use Datatables;

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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(JournalRepository $journalRepository)
    {

        $journals = $journalRepository->get();

        return view('frontend.user.spp.journal',
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

        return view('frontend.user.spp.journal',
            [
                'years'=>$this->years,
                'months'=>$this->months,
                'status'=>$this->status,
                'journals'=>$journals

            ]);
    }
}
