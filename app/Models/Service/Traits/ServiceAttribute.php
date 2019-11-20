<?php

namespace App\Models\Service\Traits;

/**
 * Class ServiceAttribute.
 */
trait ServiceAttribute {
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/5.4/eloquent-mutators#defining-an-accessor

    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute() {
        return '<div class="btn-group action-btn">
                ' . $this->getEditButtonAttribute("edit-service", "admin.services.edit") . '
                ' . $this->getDeleteButtonAttribute("delete-service", "admin.services.destroy") . '
                </div>';
    }


    public function getImageAttribute($value)
    {
        return '<img width="140" src="' . env('IMG_URL') . '/storage/app/public/img/offer/'.$value.'">';
    }

    /**
     * @return string
     */
    public function getStatusAttribute($value) {
        if ($this->isActive($value)) {
            return "<label class='label label-success'>" . trans('labels.general.active') . '</label>';
        }

        return "<label class='label label-danger'>" . trans('labels.general.inactive') . '</label>';
    }

    /**
     * @return bool
     */
    public function isActive($value) {
        return $value == 1;
    }

}
