<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;
use App\Models\Subscriptionplan\Subscriptionplan;

class SubscriptionPlansFeature extends BaseModel
{
    protected $table = 'subscription_plan_features';
    protected $fillable = ['description'];
    
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function subscriptionPlans() {
        return $this->belongsTo(Subscriptionplan::class, 'subscription_plan_id');
    }
}
