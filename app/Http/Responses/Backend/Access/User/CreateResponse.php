<?php

namespace App\Http\Responses\Backend\Access\User;

use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable {

    /**
     * @var \App\Models\Access\Role\Role
     */
    protected $roles;
    protected $role;

    /**
     * @param \Illuminate\Database\Eloquent\Collection $roles
     */
    public function __construct($roles, $role) {
        $this->roles = $roles;
        $this->role  = $role;
    }

    /**
     * In Response.
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request) {
        if ($this->role->name == 'Customer') {
            return view('backend.access.customers.create')->with([
                        'roles'              => $this->roles,
                        'role_to_be_created' => $this->role,
            ]);
        } elseif ($this->role->name == 'Vendor') {
            return view('backend.access.vendor.create')->with([
                        'roles'              => $this->roles,
                        'role_to_be_created' => $this->role,
            ]);
        } else {
            return view('backend.access.escorts.create')->with([
                        'roles'              => $this->roles,
                        'role_to_be_created' => $this->role,
            ]);
        }
    }

}
