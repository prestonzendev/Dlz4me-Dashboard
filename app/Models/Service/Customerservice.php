<?php

namespace App\Models\Service;

use App\Models\BaseModel;

class Customerservice extends BaseModel {


    protected $table = 'customer_services';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = ['user_id', 'category_id', 'service_id', 'token'];

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

    public function wallets() {
        return $this->hasOne('App\Models\Service\Wallet', 'customer_service_id');
    }

    public function service()
    {
        return $this->belongsTo('App\Models\Service\Service', 'id');
    }

}
