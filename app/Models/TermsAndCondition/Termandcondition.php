<?php

namespace App\Models\TermsAndCondition;

use App\Models\ModelTrait;
use App\Models\TermsAndCondition\Traits\TermandconditionAttribute;
use App\Models\TermsAndCondition\Traits\TermandconditionRelationship;
use Illuminate\Database\Eloquent\Model;

class Termandcondition extends Model
{
    use ModelTrait,
        TermandconditionAttribute,
        TermandconditionRelationship {
        // TermandconditionAttribute::getEditButtonAttribute insteadof ModelTrait;
    }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'terms_and_conditions';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
        'title',
        'type_id',
        'description',
        'is_latest',
        'status',
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
    ];

    /**
     * Guarded fields of model
     * @var array
     */
    protected $guarded = [
        'id',
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
