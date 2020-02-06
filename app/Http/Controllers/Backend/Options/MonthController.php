<?php

namespace App\Http\Controllers\Backend\Options;

use App\Http\Controllers\Controller;
use App\Models\Options\Month;
use App\Repositories\Frontend\Options\MonthRepository;
use App\Http\Requests\Frontend\Options\MonthRequest;

/**
 * Class MonthController
 * @package App\Http\Controllers\Backend\Options
 */
class MonthController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $months = Month::all();

        return view('backend.admin.options.month', ['months'=>$months]);
    }

    /**
     * @param MonthRequest $request
     * @param MonthRepository $monthRepository
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(MonthRequest $request, MonthRepository $monthRepository)
    {
        // Send Data
        $month['name'] = $request->input('name');

        $monthRepository->create($month);

        return redirect(route('admin.options.month'));
    }
}
