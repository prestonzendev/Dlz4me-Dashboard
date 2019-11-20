<?php

namespace App\Models\Reportedissue\Traits;

/**
 * Class ReportedissueAttribute.
 */
trait ReportedissueAttribute
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
                '.$this->getShowButtonAttribute("edit-reportedissue", "admin.reportedissues.edit").'
                '.$this->getDeleteButtonAttribute("delete-reportedissue", "admin.reportedissues.destroy").'
                </div>';
    }

    /**
     * @return string
     */
    public function getShowButtonAttribute($class)
    { 
        if (access()->allow('edit-reportedissue')) {
            return '<a class="btn btn-default btn-flat" href="' . route('admin.reportedissues.edit', $this) . '">
                    <i data-toggle="tooltip" data-placement="top" title="View" class="fa fa-eye"></i>
                </a>';
        }
    }
}
