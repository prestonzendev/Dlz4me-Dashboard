<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Model;

class Thirdpartyresponse extends Model
{

    protected $table = 'third_party_responses';

    protected $fillable = ['token', 'purchase_amount', 'offer_percentage', 'offer_amount'];

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
}
