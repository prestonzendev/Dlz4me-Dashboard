<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Access\Permission\Permission;
use App\Models\Access\Role\Role;
use App\Models\Access\User\User;
use App\Models\Service\Service;
use App\Models\Page\Page;
use App\Models\Settings\Setting;
use App\Models\Enquiry\Enquiry;
use App\Models\Usersubscriptionplan\Usersubscriptionplan;
use Illuminate\Http\Request;
use App\Exceptions\GeneralException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $settingData      = Setting::first();
        $google_analytics = $settingData->google_analytics;

        $check = DB::table('role_user')->where('user_id', '=', Auth::User()->id)->get();
        // if($check[0]->role_id == 2){
        $customers = User::whereHas('roles', function ($query)
        {
            $query->where('name', '=', 'Customer');
        })->get();
        $vendors = User::with(['roles' => function ($query) {
            $query->where('name', 'Vendor');
        }])->get();
        $services = Service::get();
        $pages    = Page::get();
        $enquiry = Enquiry::get();

        $revenue = Usersubscriptionplan::wherein('paystatus', ['Completed', 'Expired'])->sum('price');

        return view('backend.dashboard')->with([
                    'google_analytics' => $google_analytics,
                    'vendors'          => $vendors,
                    'customers'        => $customers,
                    'pages'            => $pages,
                    'services'         => $services,
                    'enquiry'          => $enquiry,
                    'revenue'          => $revenue,
                    'check'            => $check[0]->role_id
        ]);
    }

    /**
     * Used to display form for edit profile.
     *
     * @return view
     */
    public function editProfile(Request $request)
    {
        return view('backend.access.users.profile-edit')
                        ->withLoggedInUser(access()->user());
    }

    /**
     * Used to update profile.
     *
     * @return view
     */
    public function updateProfile(Request $request)
    {
        $input            = $request->all();
        $userId           = access()->user()->id;
        $user             = User::find($userId);
        $this->checkUserByEmail($input, $user);
        $user->first_name = $input['first_name'];
        $user->last_name  = $input['last_name'];
        $user->email  = $input['email'];
        $user->updated_by = access()->user()->id;

        if ($user->save()) {
            return redirect()->route('admin.profile.edit')
                            ->withFlashSuccess(trans('labels.backend.profile_updated'));
        }
    }

    /**
     * @param  $input
     * @param  $user
     *
     * @throws GeneralException
     */
    protected function checkUserByEmail($input, $user)
    {
        //Figure out if email is not the same
        if ($user->email != $input['email']) {
            //Check to see if email exists
            if (User::where('email', $input['email'])->withTrashed()->first()) {
                throw new GeneralException(trans('exceptions.backend.access.users.email_error'));
            }
        }
    }

    /**
     * This function is used to get permissions details by role.
     *
     * @param Request $request
     */
    public function getPermissionByRole(Request $request)
    {
        if ($request->ajax()) {
            $role_id                    = $request->get('role_id');
            $rsRolePermissions          = Role::where('id', $role_id)->first();
            $rolePermissions            = $rsRolePermissions->permissions->pluck('display_name', 'id')->all();
            $permissions                = Permission::pluck('display_name', 'id')->all();
            ksort($rolePermissions);
            ksort($permissions);
            $results['permissions']     = $permissions;
            $results['rolePermissions'] = $rolePermissions;
            $results['allPermissions']  = $rsRolePermissions->all;
            echo json_encode($results);
            die;
        }
    }
}
