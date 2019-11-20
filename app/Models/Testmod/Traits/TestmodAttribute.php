<?php

namespace App\Models\Testmod\Traits;

/**
 * Class TestmodAttribute.
 */
trait TestmodAttribute
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
                '.$this->getEditButtonAttribute("edit-testmod", "admin.testmods.edit").'
                '.$this->getDeleteButtonAttribute("delete-testmod", "admin.testmods.destroy").'
                </div>';
    }
}
