<?php

namespace App\Models\Enquiry\Traits;

/**
 * Class EnquiryAttribute.
 */
trait EnquiryAttribute
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
                '.$this->getShowButtonAttribute("edit-enquiry", "admin.enquiries.edit").'
                '.$this->getDeleteButtonAttribute("delete-enquiry", "admin.enquiries.destroy").'
                </div>';
    }

    /**
     * @return string
     */
    public function getShowButtonAttribute($class)
    {
        if (access()->allow('edit-enquiry')) {
            return '<a class="btn btn-default btn-flat" href="' . route('admin.enquiries.edit', $this) . '">
                    <i data-toggle="tooltip" data-placement="top" title="View" class="fa fa-eye"></i>
                </a>';
        }
    }
}
