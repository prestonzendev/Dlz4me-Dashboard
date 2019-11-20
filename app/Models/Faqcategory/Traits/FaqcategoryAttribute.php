<?php

namespace App\Models\Faqcategory\Traits;

/**
 * Class FaqcategoryAttribute.
 */
trait FaqcategoryAttribute
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
                '.$this->getEditButtonAttribute("edit-faqcategory", "admin.faqcategories.edit").'
                '.$this->getDeleteButtonAttribute("delete-faqcategory", "admin.faqcategories.destroy").'
                </div>';
    }

    /**
     * Status Attribute to show in grid
     * @return string
     */
    public function getStatusAttribute($value)
    {
        $status = '';
        if ($this->isActive($value)) {
            $status = "<label class='label label-success'>" . trans('labels.general.active') . '</label>';
        } else {
            $status = "<label class='label label-danger'>" . trans('labels.general.inactive') . '</label>';
        }

        return $status;
    }

    /**
     * @return bool
     */
    public function isActive($value) {
        return $value == 1;
    }
}
