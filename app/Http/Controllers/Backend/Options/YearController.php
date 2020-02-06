<?php

namespace App\Http\Controllers\Backend\Options;

use App\Http\Controllers\Controller;
use App\Models\Options\Year;
use App\Repositories\Frontend\Options\YearRepository;
use App\Http\Requests\Frontend\Options\YearRequest;

/**
 * Class YearController
 * @package App\Http\Controllers\Backend\Options
 */
class YearController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $years = Year::all();

        return view('backend.admin.options.year', ['years'=>$years]);
    }

    /**
     * @param YearRequest $request
     * @param YearRepository $yearRepository
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(YearRequest $request, YearRepository $yearRepository)
    {
        // Send Data
        $year['year'] = $request->input('year');

        $yearRepository->create($year);

        return redirect(route('admin.options.year'));
    }
}
