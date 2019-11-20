<?php

namespace App\Models\Access\User\Traits\Attribute;

/**
 * Class UserAttribute.
 */
trait UserAttribute
{

    /**
     * @return mixed
     */
    public function canChangeEmail()
    {
        return config('access.users.change_email');
    }

    /**
     * @return bool
     */
    public function canChangePassword()
    {
        return !app('session')->has(config('access.socialite_session_name'));
    }

    /**
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        if ($this->isActive()) {
            return "<label class='label label-success'>" . trans('labels.general.active') . '</label>';
        }

        return "<label class='label label-danger'>" . trans('labels.general.inactive') . '</label>';
    }

    /**
     * @return string
     */
    public function getConfirmedLabelAttribute()
    {
        if ($this->isConfirmed()) {
            return $this->getStatusLabelAttribute();
        }

        return $this->getStatusLabelAttribute() . " <label class='label label-danger'>Not Verified</label>";
    }

    /**
     * @return mixed
     */
    public function getPictureAttribute()
    {
        return $this->getPicture();
    }

    /**
     * @param bool $size
     *
     * @return mixed
     */
    public function getPicture($size = false)
    {
        if (!$size) {
            $size = config('gravatar.default.size');
        }

        return gravatar()->get($this->email, ['size' => $size]);
    }

    /**
     * @param $provider
     *
     * @return bool
     */
    public function hasProvider($provider)
    {
        foreach ($this->providers as $p) {
            if ($p->provider == $provider) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->status == 1;
    }

    /**
     * @return bool
     */
    public function isConfirmed()
    {
        return $this->confirmed == 1;
    }

    /**
     * @return string
     */
    public function getShowButtonAttribute($class)
    {
        if (access()->allow('show-user')) {
            return '<a class="' . $class . '" href="' . route('admin.access.user.show', $this) . '">
                    <i data-toggle="tooltip" data-placement="top" title="View" class="fa fa-eye"></i>
                </a>';
        }
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute($class) 
    {
        if (access()->allow('edit-user')) {
            if ($this->roles == 'Customer') {
                return '<a class="' . $class . '" href="' . route('admin.access.user.edit', $this) . '">
                    <i data-toggle="tooltip" data-placement="top" title="Edit" class="fa fa-pencil"></i>
                </a>';
            }elseif($this->roles == 'Vendor') {
                return '<a class="' . $class . '" href="' . route('admin.access.user.edit', $this) . '">
                    <i data-toggle="tooltip" data-placement="top" title="Edit" class="fa fa-pencil"></i>
                </a>';
            } else {
                return '';
            }
        }
    }

    /**
     * @return string
     */
    public function getChangePasswordButtonAttribute($class)
    {
        if (access()->user()->id == $this->id && access()->allow('edit-user')) {
            return '<a class="' . $class . '" href="' . route('admin.access.user.change-password', $this) . '">
                        <i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.backend.access.users.change_password') . '">
                        </i>
                    </a>';
        }
    }

    /**
     * @return string
     */
    public function getResetPasswordButtonAttribute($class)
    {
        if (access()->allow('edit-user') && $this->id != access()->id()) {
            return '<a class="' . $class . '" href="' . route('admin.access.user.create-password', $this) . '">
                        <i class="fa fa-repeat" data-toggle="tooltip" data-placement="top" title="Send Create New Password Email">
                        </i>
                    </a>';
        }
    }

    /**
     * @return string
     */
    public function getStatusButtonAttribute($class)
    {
        if ($this->id != access()->id()) {
            switch ($this->status) {
                case 0:
                    if (access()->allow('activate-user')) {
                        $name = $class == '' ? 'Activate' : '';

                        return '<a class="' . $class . '" href="' . route('admin.access.user.mark', [$this, 1]) . '"><i class="fa fa-check-square" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.backend.access.users.activate') . '"></i></a>';
                    }
                    break;

                case 1:
                    if (access()->allow('deactivate-user')) {
                        $name = ($class == '') ? 'Deactivate' : '';

                        return '<a class="' . $class . '" href="' . route('admin.access.user.mark', [$this, 0]) . '"><i class="fa fa-square" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.backend.access.users.deactivate') . '"></i></a>';
                    }
                    break;

                default:
                    return '';
            }
        }

        return '';
    }

    /**
     * @return string
     */
    public function getConfirmedButtonAttribute($class)
    {
        if (!$this->isConfirmed() && access()->allow('edit-user')) {
            return '<a class="' . $class . '" href="' . route('admin.access.user.account.confirm.resend', $this) . '"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title=' . trans('buttons.backend.access.users.resend_email') . '"></i></a> ';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getRestoreButtonAttribute($class)
    {
        if (access()->allow('delete-user')) {
            return '<a class="' . $class . '" href="' . route('admin.access.user.restore', $this) . '" name="restore_user"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.backend.access.users.restore_user') . '"></i></a> ';
        }
    }

    /**
     * user profilepic Attribute to show in grid
     * @return string
    */ 
    public function getprofilepicAttribute($value)
    {
        if ($value) {
            return '<img width="80" id="uploadPreview" alt = "Uploaded" src="' . env('IMG_URL') . '/storage/app/public/img/profilepic/'.$value.'">';
        } else {
            return 'Not Uploaded';
        }
    }


    /**
     * @return bool
     */
    public function isPicApproved($value) {
        return $value == 1;
    }

    /**
     * @return string
     */
    public function getPicapprovedAttribute($value)
    {
        if ($this->isPicApproved($value)) {
            return "<label class='label label-success'>Approved</label>";
        }

        return "<label class='label label-danger'>Awaited</label>";
    }
    
    
    /**
     * @return string
     */
    public function getDeleteButtonAttribute($class)
    {
        return '<a class="' . $class . '" href="' . route('admin.access.user.delete_soft', $this) . '" name="delete_user_perm" data-method="get" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Are you sure you want to do this?" style="cursor:pointer;"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.backend.access.users.delete') . '"></i></a> ';
        /*if (access()->allow('delete-user')) {
            
        }*/
    }

    /**
     * @return string
     */
    public function getDeletePermanentlyButtonAttribute($class)
    {
        return '<a class="' . $class . '" href="' . route('admin.access.user.delete-permanently', $this) . '" name="delete_user_perm"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.backend.access.users.delete_permanently') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getClearSessionButtonAttribute($class)
    {
        $name = $class == '' ? 'Clear Session' : '';

        if ($this->id != access()->id() && config('session.driver') == 'database' && access()->allow('clear-user-session')) {
            return '<a class="' . $class . '" href="' . route('admin.access.user.clear-session', $this) . '"
			 	 data-trans-button-cancel="' . trans('buttons.general.cancel') . '"
                 data-trans-button-confirm="' . trans('buttons.general.continue') . '"
                 data-trans-title="' . trans('strings.backend.general.are_you_sure') . '"
                 name="confirm_item"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.backend.access.users.clear_session') . '"></i>' . $name . '</a>';
        }

        return '';
    }

    public function checkAdmin()
    {
        if ($this->id != 1) {
            return '<div class="btn-group">
                        <button type="button" class="btn btn-default btn-flat">
                        '.$this->getStatusButtonAttribute('').'
                        </button>
                    </div>';
        }
    }

    /**
     * Get logged in user permission related to user management grid.
     *
     * @return array
     */
    public function getUserPermission()
    {
        $userPermission      = [];
        $attributePermission = ['8', '10', '11', '12', '13', '14', '15'];
        foreach (access()->user()->permissions as $permission) {
            if (in_array($permission->id, $attributePermission)) {
                $userPermission[] = $permission->name;
            }
        }

        return $userPermission;
    }

    /**
     * Get action button attribute by permission name.
     *
     * @param string $permissionName
     * @param int    $counter
     *
     * @return string
     */
    public function getActionButtonsByPermissionName($permissionName, $counter)
    {
        // check if counter is less then 3 then apply button client
        $class = ($counter <= 3) ? 'btn btn-default btn-flat' : '';

        switch ($permissionName) {
            case 'show-user':
                $button = ($counter <= 3) ? $this->getShowButtonAttribute($class) : '<li>'
                        . $this->getShowButtonAttribute($class) .
                        '</li>';
                break;
            case 'edit-user':
                $button = ($counter <= 3) ? $this->getEditButtonAttribute($class) : '<li>'
                        . $this->getEditButtonAttribute($class) .
                        '</li>';
                $button .= ($counter <= 3) ? $this->getChangePasswordButtonAttribute($class) : '<li>'
                        . $this->getChangePasswordButtonAttribute($class) .
                        '</li>';
                break;
            case 'activate-user':
                if (\Route::currentRouteName() == 'admin.access.user.deactivated.get') {
                    $button = ($counter <= 3) ? $this->getStatusButtonAttribute($class) : '<li>'
                            . $this->getStatusButtonAttribute($class) .
                            '</li>';
                } else {
                    $button = '';
                }
                break;
            case 'deactivate-user':
                if (\Route::currentRouteName() == 'admin.access.user.get') {
                    $button = ($counter <= 3) ? $this->getStatusButtonAttribute($class) : '<li>'
                            . $this->getStatusButtonAttribute($class) .
                            '</li>';
                } else {
                    $button = '';
                }
                break;
            case 'delete-user':
                if (access()->user()->id != $this->id) {
                    $button = ($counter <= 3) ? $this->getDeleteButtonAttribute($class) : '<li>'
                            . $this->getDeleteButtonAttribute($class) .
                            '</li>';
                } else {
                    $button = '';
                }
                break;
            case 'login-as-user':
                if (access()->user()->id != $this->id) {
                    $button = ($counter <= 3) ? $this->getLoginAsButtonAttribute($class) : '<li>'
                            . $this->getLoginAsButtonAttribute($class) .
                            '</li>';
                } else {
                    $button = '';
                }
                break;
            case 'clear-user-session':
                if (access()->user()->id != $this->id) {
                    $button = ($counter <= 3) ? $this->getClearSessionButtonAttribute($class) : '<li>'
                            . $this->getClearSessionButtonAttribute($class) .
                            '</li>';
                } else {
                    $button = '';
                }
                break;
            default:
                $button = '';
                break;
        }

        return $button;
    }

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        if ($this->trashed()) {
            return '<div class="btn-group action-btn">
                        ' . $this->getRestoreButtonAttribute('btn btn-default btn-flat') . '
                        ' . $this->getDeletePermanentlyButtonAttribute('btn btn-default btn-flat') . '
                    </div>';
        }

        // Check if role have all permission
        if (access()->user()->roles[0]->all) {
           
            return '<div class="btn-group action-btn">
                    ' . $this->getShowButtonAttribute('btn btn-default btn-flat') . '
                    ' . $this->getEditButtonAttribute('btn btn-default btn-flat') . '
                    ' . $this->getChangePasswordButtonAttribute('btn btn-default btn-flat') . '
                    ' . $this->getDeleteButtonAttribute('btn btn-default btn-flat') . '
                    ' . $this->getResetPasswordButtonAttribute('btn btn-default btn-flat') . '
                    ' . $this->checkAdmin() . '
                </div>';
        } else {
            $userPermission    = $this->getUserPermission();
            
            $permissionCounter = count($userPermission);
            $actionButton      = '<div class="btn-group action-btn">';
            $i                 = 1;

            if (access()->user()->id == $this->id) {
                if (in_array('clear-user-session', $userPermission)) {
                    $permissionCounter = $permissionCounter - 1;
                }

                if (in_array('login-as-user', $userPermission)) {
                    $permissionCounter = $permissionCounter - 1;
                }

                if (in_array('delete-user', $userPermission)) {
                    $permissionCounter = $permissionCounter - 1;
                }

                if (in_array('deactivate-user', $userPermission)) {
                    $permissionCounter = $permissionCounter - 1;
                }
            }

            foreach ($userPermission as $value) {
                if ($i != 3) {
                    $actionButton = $actionButton . '' . $this->getActionButtonsByPermissionName($value, $i);
                }

                if ($i == 3) {
                    $actionButton = $actionButton . '' . $this->getActionButtonsByPermissionName($value, $i);

                    if ($permissionCounter > 3) {
                        $actionButton = $actionButton . '
                            <div class="btn-group dropup">
                            <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-option-vertical"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">';
                    }
                }
                $i++;
            }
            $actionButton .= '</ul></div></div>';

            return $actionButton;
        }
    }
}
