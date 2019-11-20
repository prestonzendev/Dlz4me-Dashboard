<?php

namespace App\Models\NewsletterSubscriber\Traits;

use App\Models\NewsletterSubscriber\NewsletterSubscriber;

/**
 * Class NewslettersubscriberAttribute.
 */
trait NewslettersubscriberAttribute
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
                '.$this->getStatusButtonAttribute('').'
                '.$this->getDeleteButtonAttribute("delete-newslettersubscriber", "admin.newslettersubscribers.destroy").'
                </div>';
    }


    /**
     * @return string
     */
    public function getStatusButtonAttribute()
    {
        $entry = \DB::table('newsletter_subscribers')->find($this->id);
        switch ($entry->status) {
                case 0:
                    return '<a class="btn btn-flat btn-default" href="' . route('admin.newslettersubscriber.mark', [$entry->id, 1]) . '"><i class="fa fa-check-square" data-toggle="tooltip" data-placement="top" title="Subscribe"></i></a>';
                    break;
                case 1:
                    return '<a class="btn btn-flat btn-default" href="' . route('admin.newslettersubscriber.mark', [$entry->id, 0]) . '"><i class="fa fa-square" data-toggle="tooltip" data-placement="top" title="Unsubscribe"></i></a>';
                    break;
                default:
                return '';
            }
        return '';
    }

    /**
     * @return string
     */
    public function getStatusAttribute($value)
    {
        if ($this->isSubscribed($value)) {
            return "<label class='label label-success'>Subscribed</label>";
        }

        return "<label class='label label-danger'>Unsubscribed</label>";
    }


    /**
     * @return bool
     */
    public function isSubscribed($value)
    {
        return $value == 1;
    }
}
