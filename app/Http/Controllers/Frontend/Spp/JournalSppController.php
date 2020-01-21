<?php

namespace App\Http\Controllers\Frontend\Spp;

use App\Http\Controllers\Controller;
use App\Models\Options\Month;
use App\Models\Options\Year;
use App\Models\Spp\Journal;

/**
 * Class DashboardController.
 */
class JournalSppController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $years = Year::all()->pluck('year', 'id');

        $months = Month::all()->pluck('month', 'id');

        $journals = Journal::query()->get();

        $total = 0;

        foreach ($journals as $value){
            $total += $value->amount;
        }

        return view('frontend.user.spp.journal', ['years'=>$years, 'months'=>$months, 'journals'=>$journals, 'total'=>$total]);
    }

    public function filter()
    {
        $years = Year::all()->pluck('year', 'id');

        $months = Month::all()->pluck('month', 'id');

        $journals = Journal::query()->get();

        $total = 0;

        foreach ($journals as $value){
            $total += $value->amount;
        }

        return view('frontend.user.spp.journal', ['years'=>$years, 'months'=>$months, 'journals'=>$journals, 'total'=>$total]);
    }
}
