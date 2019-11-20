<?php

namespace App\Models\Service\Traits;

use App\Models\ServiceCategory\Servicecategory;

/**
 * Class ServiceRelationship
 */
trait ServiceRelationship
{
    /*
    * put you model relationships here
    * Take below example for reference
    */
    /*
    public function users() {
        //Note that the below will only work if user is represented as user_id in your table
        //otherwise you have to provide the column name as a parameter
        //see the documentation here : https://laravel.com/docs/5.4/eloquent-relationships
        $this->belongsTo(User::class);
    }
     */
    
    
    /**
     * Blogs has many relationship with categories.
     */
    public function categories()
    {
        return $this->belongsToMany(Servicecategory::class, 'service_map_categories', 'service_id', 'category_id');
    }
}
