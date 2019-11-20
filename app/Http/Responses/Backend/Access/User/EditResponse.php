<?php

namespace App\Http\Responses\Backend\Access\User;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable {

    /**
     * @var \App\Models\Access\User\User
     */
    protected $user;

    /**
     * @var \App\Models\Access\Permission\Permission
     */
    protected $permissions;

    /**
     * @var \App\Models\Access\Role\Role
     */
    protected $roles;

    /**
     * @param \App\Models\Access\User\User $user
     */
    public function __construct($user, $roles, $permissions) {
        $this->user        = $user;
        $this->roles       = $roles;
        $this->permissions = $permissions;
    }

    /**
     * toReponse.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request) {
        $permissions     = $this->permissions;
        $userPermissions = $this->user->permissions()->get()->pluck('id')->toArray();
        if ($this->user->roles[0]->name == 'Customer') {
            return view('backend.access.customers.edit')->with([
                        'user'            => $this->user,
                        'userRoles'       => $this->user->roles->pluck('id')->all(),
                        'roles'           => $this->roles,
                        'userPermissions' => $userPermissions,
                        'permissions'     => $permissions,
            ]);
        } else {
            return view('backend.access.vendor.edit')->with([
                        'user'            => $this->user,
                        'userRoles'       => $this->user->roles->pluck('id')->all(),
                        'roles'           => $this->roles,
                        'userPermissions' => $userPermissions,
                        'permissions'     => $permissions,
            ]);
        }
    }

}
