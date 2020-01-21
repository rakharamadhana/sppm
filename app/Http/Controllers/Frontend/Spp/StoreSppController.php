<?php

namespace App\Http\Controllers\Frontend\Spp;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Spp\StoreSppRequest;
use App\Models\Options\Group;
use App\Models\Options\Month;
use App\Models\Options\Year;
use App\Models\Spp\Journal;

/**
 * Class DashboardController.
 */
class StoreSppController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $years = Year::all()->pluck('year','year');

        $months = Month::all()->pluck('month','month');

        $groups = Group::all()->pluck('name','name');

        $genders = [
            '1'=>'Pria',
            '2'=>'Wanita'
        ];

        return view('frontend.user.spp.store', ['years'=>$years, 'months'=>$months, 'groups'=>$groups, 'genders'=>$genders]);
    }

    public function store(StoreSppRequest $request)
    {

        // Finding Group Code
        $groupName = $request->input('group');
        $groupGender = $request->input('gender');
        $groupCode = $this->findGroupCode($groupName, $groupGender);

        // Send Data
        $input['code'] = $groupCode;
        $input['year'] = $request->input('year');
        $input['month'] = $request->input('month');
        $input['amount'] = $request->input('amount');
        $input['receipt'] = $request->input('receipt');
        $input['form'] = $request->input('form');
        $input['status'] = 'Pending';

        $journal = new Journal;

        $journal->code = $input['code'];
        $journal->year = $input['year'];
        $journal->month = $input['month'];
        $journal->amount = $input['amount'];
        $journal->receipt = $input['receipt'];
        $journal->form = $input['form'];
        $journal->status = $input['status'];

        $journal->save();

        return redirect('spp/journal');
    }

    public function findGroupCode($groupName, $gender){
        return Group::select('code')
            ->where('gender', $gender)
            ->where('name', $groupName)
            ->pluck('code')
            ->first();
    }
}
