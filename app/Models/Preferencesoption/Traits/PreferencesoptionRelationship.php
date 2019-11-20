<?php

namespace App\Models\Preferencesoption\Traits;

use App\Models\Preference\Preference;
use App\OptionField;
use App\PreferencesOptionsValue;

/**
 * Class PreferencesoptionRelationship
 */
trait PreferencesoptionRelationship {
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

    public function preferences() {
        return $this->belongsTo(Preference::class);
    }

    public function optionFields() {

        return $this->belongsTo(OptionField::class);
    }

    public function preferencesOptionsValue() {

        return $this->hasMany(PreferencesOptionsValue::class,'preferences_option_id');
    }

}
