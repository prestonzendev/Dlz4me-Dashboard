<?php

namespace App\Models\Preferencesoption;

use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Preferencesoption\Traits\PreferencesoptionAttribute;
use App\Models\Preferencesoption\Traits\PreferencesoptionRelationship;

class Preferencesoption extends Model
{
    use ModelTrait,
        PreferencesoptionAttribute,
    	PreferencesoptionRelationship {
            // PreferencesoptionAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'preferences_options';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
       'preference_id', 'title', 'slug', 'displayorder', 'displaytype', 'option_field_id','status','deleted_at'
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
