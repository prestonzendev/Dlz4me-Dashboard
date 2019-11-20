<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\SoftDeletes;

use Cartalyst\Tags\TaggableTrait;

use Cartalyst\Tags\TaggableInterface;

class ServiceCategoryTranslation extends Model
{
    public $timestamps = false;

    public $fillable = [
        'name',
    ];
}