<?php

namespace App\Models\Banner\Traits;

use Illuminate\Support\Facades\Storage;

/**
 * Class BannerAttribute.
 */
trait BannerAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/5.4/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        if ($this->id == 1) {
            return '<div class="btn-group action-btn">
                '.$this->getEditButtonAttribute("edit-banner", "admin.banners.edit").'
                </div>';
        } else {
            return '<div class="btn-group action-btn">
                '.$this->getEditButtonAttribute("edit-banner", "admin.banners.edit").'
                '.$this->getDeleteButtonAttribute("delete-banner", "admin.banners.destroy").'
                </div>';
        }
    }

    /**
     * Banner file Attribute to show in grid
     * @return string
    */ 
    public function getBannerfileAttribute($value)
    {
        return '<img width="140" src="' . env('IMG_URL') . '/storage/app/public/img/banner/'.$value.'">';
    }

    /**
     * Banner file Attribute to show in grid
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
    public function isActive($value) {
        return $value == 1;
    }


}
