<?php

namespace App\Models\Review\Traits;

/**
 * Class ReviewAttribute.
 */
trait ReviewAttribute
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
                '.$this->getShowButtonAttribute().'
                '.$this->getEditButtonAttribute("edit-review", "admin.reviews.edit").'
                '.$this->getDeleteButtonAttribute("delete-review", "admin.reviews.destroy").'
                </div>';
    }

    /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
        return '<a class="btn btn-default btn-flat" href="' . route('admin.review.show', $this) . '">
                    <i data-toggle="tooltip" data-placement="top" title="View" class="fa fa-eye"></i>
                </a>';
    }

    /**
     * Review status Attribute to show in grid
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

    /**
     * Photo Attribute to show in grid
     * @return string
    */ 
    public function getPhotoAttribute($value)
    {
        return '<img width="140" src="' . env('IMG_URL') . '/storage/app/public/img/review/'.$value.'">';
    }

    /**
     * Review grade Attribute to show in grid
     * @return string
     */
    public function getGradeAttribute($value)
    {
        $grade = '';
        if ($value > 0) {
            for ($i=0; $i<$value; $i++) {
                $grade .= '<img src="' . env('IMG_URL') . '/images/star-icon.png">';
            }
        }

        $grade .= ' (' . $value . ')';

        return $grade;
    }
}
