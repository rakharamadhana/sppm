<?php

namespace App\Http\Controllers\Backend\Options;

use App\Http\Controllers\Controller;
use App\Models\Options\Group;
use App\Repositories\Frontend\Options\GroupRepository;
use App\Http\Requests\Frontend\Options\GroupRequest;

/**
 * Class GroupController
 * @package App\Http\Controllers\Backend\Options
 */
class GroupController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $groups = Group::all();

        $genders = [
            '1'=>'Pria',
            '2'=>'Wanita'
        ];

        return view('backend.admin.options.group', ['groups'=>$groups, 'genders'=>$genders]);
    }

    /**
     * @param GroupRequest $request
     * @param GroupRepository $groupRepository
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(GroupRequest $request, GroupRepository $groupRepository)
    {
        // Send Data
        $group['code'] = $request->input('code');
        $group['name'] = $request->input('name');

        $groupRepository->create($group);

        return redirect(route('admin.options.group'));
    }
}
