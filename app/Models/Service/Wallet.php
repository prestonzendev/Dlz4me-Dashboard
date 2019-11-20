<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = ['user_id', 'category_id', 'service_id', 'purchase_amount', 'offer_amount', 'offer_percentage'];

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

    public function customerService() {
        return $this->belongsTo('App\Models\Service\Customerservice', 'id');
    }
}
