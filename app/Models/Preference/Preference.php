<?php

namespace App\Models\Preference;

use App\Models\BaseModel;
use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Preference\Traits\PreferenceAttribute;
use App\Models\Preference\Traits\PreferenceRelationship;

class Preference extends BaseModel
{
    use ModelTrait,
        PreferenceAttribute,
    	PreferenceRelationship {
            // PreferenceAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'preferences';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
        'title', 'is_active','is_deleted'
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
