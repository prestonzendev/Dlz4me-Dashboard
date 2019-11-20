<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\DashboardViewRequest;
use App\Repositories\Frontend\Access\User\UserRepository;
use App\Models\Preference\Preference;
use App\Models\Preferencesoption\Preferencesoption;
use DB;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(DashboardViewRequest $request)
    {
        UserRepository::checkexpiredplans();
        $userplans = UserRepository::getUserPlans();
    	return view('frontend.user.dashboard')->with(
        	[
        		'title' => 'Dashboard',
                'userplans' => $userplans,
        	]
        );
    }
}
