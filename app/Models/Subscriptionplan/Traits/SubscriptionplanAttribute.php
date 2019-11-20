<?php

namespace App\Models\Subscriptionplan\Traits;

/**
 * Class SubscriptionplanAttribute.
 */
trait SubscriptionplanAttribute {
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/5.4/eloquent-mutators#defining-an-accessor

    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute() {
        return '<div class="btn-group action-btn">
                ' . $this->getEditButtonAttribute("edit-subscriptionplan", "admin.subscriptionplans.edit") . '
                ' . $this->getDeleteButtonAttribute("delete-subscriptionplan", "admin.subscriptionplans.destroy") . '
                ' . $this->getViewButtonAttribute() . '
                </div>';
    }

    /**
     * @return string
     */
    public function getViewButtonAttribute() {

        return '<a href="' . route('admin.subscriptionplans.view', $this) . '" class="btn btn-flat btn-default"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="' . trans('labels.backend.subscriptionplans.view') . '"></i></a>';
    }

    /**
     * Banner file Attribute to show in grid
     * @return string
     */
    public function getStatusLabelAttribute() {
        if ($this->isActive()) {
            return "<label class='label label-success'>" . trans('labels.general.active') . '</label>';
        }

        return "<label class='label label-danger'>" . trans('labels.general.inactive') . '</label>';
    }

    /**
     * @return bool
     */
    public function isActive() {
        return $this->status == 1;
    }

    /**
     * Price with currency Attribute to show in grid
     * @return string
     */
    public function getPriceWithCurrencyAttribute() {

        return settings()->currency_symbol . $this->price;
    }

}
