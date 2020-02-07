<?php

namespace App\Http\Controllers\Frontend\Spp;

use App\Http\Controllers\Controller;
use App\Http\Requests\Spp\ReportSppRequest;
use App\Models\Options\Month;
use App\Models\Options\Year;
use App\Models\Spp\Journal;
use App\Repositories\Spp\JournalRepository;
use Illuminate\Http\Request;
use Storage;
use ZipArchive;

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

    /**
     * @param string $year
     * @param string $month
     * @return int|\Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function downloadReceipts(string $year, string $month){
        $journals = Journal::query()
            ->where('year', $year)
            ->where('month', $month)
            ->get();

        Storage::disk('public')->makeDirectory('zips');

        $storage_dir = storage_path('zips');

        $zipFileName = 'Receipts.zip';

        $zip = new \ZipArchive();
        //dd($public_dir);
        $zip->open($storage_dir . '/' . $zipFileName, ZipArchive::CREATE);

        foreach ($journals as $journal){
            $zip->addFile(storage_path('app/public/spp/'.$year.'/'.$month.'/'.$journal->receipt), $journal->receipt);
        }

        $zip->close();

        // Set Header
        $headers = array(
            'Content-Type' => 'application/octet-stream',
        );

        $fileToPath = $storage_dir.'/'.$zipFileName;

        return response()->download($fileToPath,$zipFileName,$headers);
    }
}
