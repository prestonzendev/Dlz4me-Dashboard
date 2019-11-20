<?php

namespace App\Models\Service;

use App\Models\BaseModel;
use App\Models\ModelTrait;
use App\Models\Service\Traits\ServiceAttribute;
use App\Models\Service\Traits\ServiceRelationship;

class Service extends BaseModel {

    use ModelTrait,
        ServiceAttribute,
        ServiceRelationship {
//        ServiceAttribute::getStatusLabelAttribute insteadof ModelTrait;
    }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table;

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = ['vendor_id', 'name', 'title', 'image', 'image_path', 'description', 'url', 
    'start_date', 'end_date', 'disc_perc', 'coupon_code', 'offer_type', 'status','is_featured'];

    /**
     * Dates
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
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
    public function __construct(array $attributes = []) {
        parent::__construct($attributes);
        $this->table = config('module.services.table');
    }
    public function servicecategory()
    {
        return $this->belongsTo('App\Models\ServiceCategory\Servicecategory', 'id');
    }
    public function user() {
        return $this->belongsTo('App\Models\Api\User', 'vendor_id');
    }
    public function custServ() {
        return $this->hasMany('App\Models\Service\Customerservice', 'service_id');
    }

}
