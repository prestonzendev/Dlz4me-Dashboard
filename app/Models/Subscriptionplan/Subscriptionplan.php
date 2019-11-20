<?php

namespace App\Models\Subscriptionplan;

use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subscriptionplan\Traits\SubscriptionplanAttribute;
use App\Models\Subscriptionplan\Traits\SubscriptionplanRelationship;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscriptionplan extends Model
{
    use ModelTrait,
        SubscriptionplanAttribute,
        SoftDeletes,
    	SubscriptionplanRelationship {
            // SubscriptionplanAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'subscription_plans';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
        'title', 'duration', 'stripe_id', 'strip_test_id', 'usercount', 'price','status','deleted_at'
    ];

    /**
     * Default values for model fields
     * @var array
     */
    protected $attributes = [

    ];

    /**
     * Dates
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Guarded fields of model
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * Constructor of Model
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
