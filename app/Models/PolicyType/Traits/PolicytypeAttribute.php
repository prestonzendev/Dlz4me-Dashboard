<?php

namespace App\Models\PolicyType\Traits;

/**
 * Class PolicytypeAttribute.
 */
trait PolicytypeAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/5.4/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">
                '.$this->getEditButtonAttribute("edit-policytype", "admin.policytypes.edit").'
                '.$this->getDeleteButtonAttribute("delete-policytype", "admin.policytypes.destroy").'
                </div>';
    }


    /**
     * @return string
     */
    public function getStatusAttribute($value)
    {
        if ($this->isActive($value)) {
            return "<label class='label label-success'>" . trans('labels.general.active') . '</label>';
        }

        return "<label class='label label-danger'>" . trans('labels.general.inactive') . '</label>';
    }

    /**
     * @return bool
     */
    public function isActive($value)
    {
        return $value == 1;
    }
}
