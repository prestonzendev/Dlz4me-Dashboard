<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Model;

class Redeem extends Model
{
    protected $fillable = ['user_id', 'bank_account_id', 'amount', 'msg'];

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
