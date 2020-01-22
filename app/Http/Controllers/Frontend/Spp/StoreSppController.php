<?php

namespace App\Http\Controllers\Frontend\Spp;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Spp\StoreSppRequest;
use App\Models\Options\Group;
use App\Models\Options\Month;
use App\Models\Options\Year;
use App\Repositories\Frontend\Spp\JournalRepository;
use phpDocumentor\Reflection\Types\Integer;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

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

    /**
     * @param StoreSppRequest $request
     * @param JournalRepository $journalRepository
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Throwable
     */
    public function store(StoreSppRequest $request, JournalRepository $journalRepository)
    {

        //dump($request->file('receipt'));
        //dd($request->file('form'));

        // Finding Group Code
        $groupName = $request->input('group');
        $groupGender = $request->input('gender');
        $groupCode = $this->findGroupCode($groupName, $groupGender);

        // Send Data
        $journal['user_id'] = $request->session()->get('user_id');
        $journal['user_name'] = $request->session()->get('user_name');
        $journal['code'] = $groupCode;
        $journal['year'] = $request->input('year');
        $journal['month'] = $request->input('month');
        $journal['amount'] = $request->input('amount');
        $journal['receipt'] = $request->file('receipt');
        $journal['form'] = $request->file('form');

        $journalRepository->create($journal);

        return redirect('spp/journal');
    }

    /**
     * @param string $groupName
     * @param string $gender
     * @return mixed
     */
    public function findGroupCode(string $groupName, string $gender){
        return Group::select('code')
            ->where('gender', $gender)
            ->where('name', $groupName)
            ->pluck('code')
            ->first();
    }
}
