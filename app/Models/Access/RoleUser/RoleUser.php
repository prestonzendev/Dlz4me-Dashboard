<?php

namespace App\Models\Access\RoleUser;

use App\Models\BaseModel;
use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Role.
 */
class RoleUser extends BaseModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'role_id'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('access.role_user_table');
    }    
    
    /**
     * Get the associated role record of user
     * 
     * @return App\Models\Access\Rol[]
     */
    public function role() {
        return $this->belongsTo('app\Models\Access\Role\Role', 'role_id');
    }
    
    /**
     * Get the associated user record
     * 
     * @return App\Models\Access\Rol[]
     */
    public function user() {
        return $this->belongsTo('app\Models\Access\User\User', 'user_id');
    }
}
