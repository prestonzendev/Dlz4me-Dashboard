<?php

namespace App\Models\Api;

//use App\Models\Access\User\Traits\Attribute\UserAttribute;
use App\Models\Access\User\Traits\Relationship\UserRelationship;
use App\Models\Access\User\Traits\Scope\UserScope;
use App\Models\Access\User\Traits\UserAccess;
use App\Models\Access\User\Traits\UserSendPasswordReset;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Laravel\Cashier\Billable;
use Laravel\Passport\HasApiTokens;
use App\Models\ServiceCategory\Servicecategory;

/**
 * Class User.
 */
class User extends Authenticatable implements JWTSubject {

    protected $guard = 'user';
    use UserScope,
        UserAccess,
        Notifiable,
        SoftDeletes,
        UserRelationship,
        Billable,
        UserSendPasswordReset,
        HasApiTokens;

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
    protected $fillable = [
        'first_name',
        'last_name',
        'accountname',
        'email',
        'phone',
        'dob',
        'gender',
        'password',
        'profilepic',
        'address',
        'city',
        'state',
        'country',
        'zip',
        'status',
        'confirmation_code',
        'mobile_code',
        'referral_code',
        'refer_by',
        'confirmed',
        'created_by',
        'updated_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = []) {
        parent::__construct($attributes);
        $this->table = config('access.users_table');
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier() {
        return $this->getKey();
    }
    
    /**
     * Get the associated role record of user
     * 
     * @return App\Models\Access\Rol[]
     */
    public function role() {
        return $this->hasOne('App\Models\Access\RoleUser\RoleUser', 'role_id');
    }
    
    /**
     * Get the associated role record of user
     * 
     * @return App\Models\Access\Rol[]
     */
    public function user() {
        return $this->hasOne('App\Models\Access\RoleUser\RoleUser', 'user_id');
    }

    public function services() {
        return $this->hasMany('App\Models\Service\Service','vendor_id');
    }

    public function service() {
        return $this->hasOne('App\Models\Service\Service','vendor_id')->whereNotNull('is_featured')->orderBy('is_featured','desc')->limit(1);
    }



    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [
            'id'          => $this->id,
            'first_name'  => $this->first_name,
            'last_name'   => $this->last_name,
            'email'       => $this->email,
            'picture'     => $this->getPicture(),
            'picpath'     => $this->getPicPath(),
            'confirmed'   => $this->confirmed,
            'role'        => optional($this->roles()->first())->name,
            'permissions' => $this->permissions()->get(),
            'status'      => $this->status,
            'created_at'  => $this->created_at->toIso8601String(),
            'updated_at'  => $this->updated_at->toIso8601String(),
        ];
    }

    public function service_categories()
    {
        return $this->hasMany(Servicecategory::class);
    }

    public function getprofilepicAttribute($value)
    {
        if ($value) {
            return env('IMG_URL') . '/storage/app/public/img/profilepic/'.$value;
        } else {
            return 'Not Uploaded';
        }
    }

}
