<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Preferencesoption\Preferencesoption;
use App\Models\BaseModel;

class PreferencesOptionsValue extends BaseModel {

    protected $table = 'preferences_options_values';
    protected $fillable = ['title','deleted_at'];
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function preferencesOption() {
        return $this->belongsTo(Preferencesoption::class, 'preferences_option_id');
    }
}
