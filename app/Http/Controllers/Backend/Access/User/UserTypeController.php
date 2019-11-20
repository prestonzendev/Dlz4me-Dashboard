<?php

namespace App\Http\Controllers\Backend\Access\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Access\User\CreateUserRequest;
use App\Http\Requests\Backend\Access\User\DeleteUserRequest;
use App\Http\Requests\Backend\Access\User\EditUserRequest;
use App\Http\Requests\Backend\Access\User\ManageUserRequest;
use App\Http\Requests\Backend\Access\User\ShowUserRequest;
use App\Http\Requests\Backend\Access\User\StoreUserRequest;
use App\Http\Requests\Backend\Access\User\UpdateUserRequest;
use App\Http\Responses\Backend\Access\User\CreateResponse;
use App\Http\Responses\Backend\Access\User\EditResponse;
use App\Http\Responses\Backend\Access\User\ShowResponse;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Models\Access\Permission\Permission;
use App\Models\Access\User\User;
use App\Models\Access\Role\Role;
use App\Repositories\Backend\Access\Role\RoleRepository;
use App\Repositories\Backend\Access\User\UserRepository;

/**
 * Class UserStatusController.
 */
class UserTypeController extends Controller
{

    /**
     * @var \App\Repositories\Backend\Access\User\UserRepository
     */
    protected $users;

    /**
     * @var \App\Repositories\Backend\Access\Role\RoleRepository
     */
    protected $roles;

    /**
     * @param \App\Repositories\Backend\Access\User\UserRepository $users
     * @param \App\Repositories\Backend\Access\Role\RoleRepository $roles
     */
    public function __construct(UserRepository $users, RoleRepository $roles)
    {
        $this->users = $users;
        $this->roles = $roles;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function getCustomers(ManageUserRequest $request)
    {
        return view('backend.access.customers.index');
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */

    public function getVendor(ManageUserRequest $request)
    {
        return view('backend.access.vendor.index');
    }

    //Create Customer View
    public function createCustomer(CreateUserRequest $request)
    {
        $role_to_be_created = Role::where('name', 'Customer')->first();
        $roles  = $this->roles->getAll();
        return new CreateResponse($roles, $role_to_be_created);
    }

    //Create Vendor View
    public function createVendor(CreateUserRequest $request)
    {
        $role_to_be_created = Role::where('name', 'Vendor')->first();
        $roles  = $this->roles->getAll();
        return new CreateResponse($roles, $role_to_be_created);
    }

    //Create Escort View
    public function createEscort(CreateUserRequest $request)
    {
        $role_to_be_created = Role::where('name', 'Escort')->first();
        $roles = $this->roles->getAll();
        return new CreateResponse($roles, $role_to_be_created);
    }

    /**
     * @param StoreUserRequest $request
     *
     * @return mixed
     */
    public function storeCustomer(StoreUserRequest $request)
    {
        $this->users->create($request);
        return new RedirectResponse(route('admin.access.user.customers.index'), ['flash_success' => trans('alerts.backend.users.created')]);
    }

    /**
     * @param StoreUserRequest $request
     *
     * @return mixed
     */
    public function storeVendor(StoreUserRequest $request)
    {
        $request->request->add(['assignees_roles' => array(2)]);
        $role = Role::where('name', 'Vendor')->first();
        $permissions = $role->permissions()->get()->toArray();
        $perms = array();
        foreach ($permissions as $permission) {
            $perms[$permission['id']] = $permission['id'];
        }
        $request->request->add(['permissions' => $perms]);
        $this->users->create($request);
        return new RedirectResponse(route('admin.access.user.vendor.index'), ['flash_success' => trans('alerts.backend.users.created')]);
    }

    /**
     * @param StoreUserRequest $request
     *
     * @return mixed
     */
    public function storeEscort(StoreUserRequest $request)
    {
        $this->users->create($request);
        return new RedirectResponse(route('admin.access.user.escorts.index'), ['flash_success' => trans('alerts.backend.users.created')]);
    }

    public function showCustomer(User $user, ShowUserRequest $request)
    {
        return new ShowResponse($user);
    }

    public function showEscort(User $user, ShowUserRequest $request)
    {
        return new ShowResponse($user);
    }

    public function editCustomer(User $user, EditUserRequest $request)
    {
        $permissions = Permission::getSelectData('display_name');
        return new EditResponse($user, $roles, $permissions);
    }

    public function editVendor(User $user, EditUserRequest $request)
    {
        $permissions = Permission::getSelectData('display_name');
        return new EditResponse($user, $roles, $permissions);
    }

    public function updateCustomer(User $user, UpdateUserRequest $request)
    {
        $user = User::find($request->user_id);
        $this->users->update($user, $request);

        return new RedirectResponse(route('admin.access.user.customers.index'), ['flash_success' => trans('alerts.backend.users.updated')]);
    }

    public function updateEscort(User $user, UpdateUserRequest $request)
    {
        $this->users->update($user, $request);

        return new RedirectResponse(route('admin.access.escorts.index'), ['flash_success' => trans('alerts.backend.users.updated')]);
    }

    public function destroyCustomer(User $user, DeleteUserRequest $request)
    {
        $this->users->delete($user);

        return new RedirectResponse(route('admin.access.customers.index'), ['flash_success' => trans('alerts.backend.users.deleted')]);
    }

    public function destroyEscort(User $user, DeleteUserRequest $request)
    {
        $this->users->delete($user);

        return new RedirectResponse(route('admin.access.escorts.index'), ['flash_success' => trans('alerts.backend.users.deleted')]);
    }
}
