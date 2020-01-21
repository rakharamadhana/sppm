<?php

namespace App\Http\Controllers\Frontend\Spp;

use App\Http\Controllers\Controller;
use App\Models\Options\Year;

/**
 * Class DashboardController.
 */
class ReportSppController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $years = Year::all()->pluck('year', 'id');

        return view('frontend.user.spp.report', ['years'=>$years]);
    }
}
