<?php

namespace App\Models\Redeem;

use App\Models\BaseModel;
use App\Models\ModelTrait;
use App\Models\Redeem\Traits\RedeemAttribute;
use App\Models\Redeem\Traits\RedeemRelationship;

class Redeem extends BaseModel {

    use ModelTrait,
        RedeemAttribute,
        RedeemRelationship {
//        RedeemAttribute::getStatusLabelAttribute insteadof ModelTrait;
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
    protected $fillable = ['status'];

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
        $this->table = config('module.redeems.table');
    }
    public function bankaccount()
    {
        return $this->hasMany('App\Models\Service\BankAccount', 'id');
    }
    public function user() {
        return $this->hasMany('App\Models\Api\User', 'id');
    }

}
