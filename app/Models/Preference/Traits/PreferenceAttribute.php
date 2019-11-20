<?php

namespace App\Models\Preference\Traits;

/**
 * Class PreferenceAttribute.
 */
trait PreferenceAttribute
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
                '.$this->getEditButtonAttribute("edit-preference", "admin.preferences.edit").'
                '.$this->getDeleteButtonAttribute("delete-preference", "admin.preferences.destroy").'
                </div>';
    }
    

    /**
     * Banner file Attribute to show in grid
     * @return string
     */
    public function getIsActiveLabelAttribute()
    {
        if ($this->isActive()) {
            return "<label class='label label-success'>" . trans('labels.general.active') . '</label>';
        }

        return "<label class='label label-danger'>" . trans('labels.general.inactive') . '</label>';
    }

    /**
     * @return bool
     */
    public function isActive() {
        return $this->is_active == 1;
    }
}
