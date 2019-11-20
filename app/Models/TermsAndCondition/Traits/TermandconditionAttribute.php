<?php

namespace App\Models\TermsAndCondition\Traits;

use App\Models\TermsAndCondition\Termandcondition;
use App\Models\PolicyType\Policytype;

/**
 * Class TermandconditionAttribute.
 */
trait TermandconditionAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/5.4/eloquent-mutators#defining-an-accessor

    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        $last_entry = \DB::table('terms_and_conditions')->where('title', $this->title)->orderBy('created_at', 'desc')->first();
        if ($this->id == $last_entry->id) {
            return '<div class="btn-group action-btn">
                    ' . $this->getEditButtonAttribute("edit-termandcondition", "admin.termandconditions.edit") . '
                    </div>';
        } else {
            return '<div class="btn-group action-btn">
            ' . $this->getEditButtonAttribute("edit-termandcondition", "admin.termandconditions.edit") . '
            ' . $this->getDeleteButtonAttribute("delete-termandcondition", "admin.termandconditions.destroy") . '
            </div>';
        }
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
     * @return string
     */
    public function getTypeIdAttribute($value)
    {
        if (!empty($value)) {
            $policytype = Policytype::find($value);
            return $policytype->name;
        } else {
            return '';
        }
    }

    /**
     * @return bool
     */
    public function isActive($value)
    {
        return $value == 1;
    }

    /**
     * @return string
     */
    public function getIsLatestAttribute($value)
    {
        if ($this->isLatest($value)) {
            return "<label class='label label-success'>" . 'Yes' . '</label>';
        }

        return "<label class='label label-danger' disabled>" . 'No' . '</label>';
    }

    /**
     * @return bool
     */
    public function isLatest($value)
    {
        return $value == 1;
    }
}
