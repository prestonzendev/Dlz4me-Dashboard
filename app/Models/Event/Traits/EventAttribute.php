<?php

namespace App\Models\Event\Traits;

/**
 * Class EventAttribute.
 */
trait EventAttribute {
// Make your attributes functions here
// Further, see the documentation : https://laravel.com/docs/5.4/eloquent-mutators#defining-an-accessor

    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute() {
        return '';
//        return '<div class="btn-group action-btn">
//                '.$this->getEditButtonAttribute("edit-event", "admin.events.edit").'
//                '.$this->getDeleteButtonAttribute("delete-event", "admin.events.destroy").'
//                </div>';
    }

    public function getTextAttribute($value) {
        return '<li>
                    <i class = "fa fa-{{ $historyItem->icon }} {{ $historyItem->class }}"></i>

                    <div class = "timeline-item">
                    <span class = "time"><i class = "fa fa-clock-o"></i> {{ $historyItem->created_at->diffForHumans() }}</span>

                    <h3 class = "timeline-header no-border"><strong>{{ $historyItem->user->name }}</strong> {!!history()->renderDescription($historyItem->text, $historyItem->assets)!!}</h3>
                    </div><!--timeline-item-->
               </li>';
//        return '<div class="btn-group action-btn">
//                '.$this->getEditButtonAttribute("edit-event", "admin.events.edit").'
//                '.$this->getDeleteButtonAttribute("delete-event", "admin.events.destroy").'
//                </div>';
    }

}
