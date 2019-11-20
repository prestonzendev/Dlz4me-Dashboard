<?php

namespace App\Models\ServiceCategory\Traits;

use Illuminate\Support\Facades\Storage;

/**
 * Class ServicecategoryAttribute.
 */
trait ServicecategoryAttribute {
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/5.4/eloquent-mutators#defining-an-accessor

    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute() {
        return '<div class="btn-group action-btn">
                ' . $this->getEditButtonAttribute("edit-servicecategory", "admin.servicecategories.edit") . '
                ' . $this->getDeleteButtonAttribute("delete-servicecategory", "admin.servicecategories.destroy") . '
                </div>';
    }

    public function getImageAttribute($value)
    {
        return '<img width="140" src="' . env('IMG_URL') . '/storage/app/public/img/category/'.$value.'">';
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
