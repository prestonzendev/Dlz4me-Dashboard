<?php

namespace App\Models\ServiceCategory;

use App\Models\BaseModel;
use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\ServiceCategory\Traits\ServicecategoryAttribute;
use App\Models\ServiceCategory\Traits\ServicecategoryRelationship;
use App\Models\Service\Service;

class Servicecategory extends BaseModel {

    use ModelTrait,
        ServicecategoryAttribute,
        ServicecategoryRelationship {
        // ServicecategoryAttribute::getEditButtonAttribute insteadof ModelTrait;
    }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'service_categories';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = ['name', 'status', 'image','image_path'
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
    }

    /*public function category() {
        return $this->belongsTo('app\Models\ServiceCategory\ServiceCategory', 'category_id');
    }

    public function service() {
        return $this->belongs('App\Models\Service\Service', 'service_id');
    }*/
    

    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_map_categories', 'category_id');
    }

}
