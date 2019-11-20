<?php

namespace App\Models\Service;

use App\Models\BaseModel;

class Serviceapply extends BaseModel {

   
    protected $table = 'service_apply';

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
    

}
