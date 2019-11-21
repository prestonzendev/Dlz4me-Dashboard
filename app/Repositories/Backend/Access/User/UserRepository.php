<?php

namespace App\Repositories\Backend\Access\User;

use App\Events\Backend\Access\User\UserCreated;
use App\Events\Backend\Access\User\UserDeactivated;
use App\Events\Backend\Access\User\UserDeleted;
use App\Events\Backend\Access\User\UserPasswordChanged;
use App\Events\Backend\Access\User\UserPermanentlyDeleted;
use App\Events\Backend\Access\User\UserReactivated;
use App\Events\Backend\Access\User\UserRestored;
use App\Events\Backend\Access\User\UserUpdated;
use App\Exceptions\GeneralException;
use App\Models\Access\User\User;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;
use App\Repositories\Backend\Access\Role\RoleRepository;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

/**
 * Class UserRepository.
 */
class UserRepository extends BaseRepository
{

    /**
     * Associated Repository Model.
     */
    const MODEL = User::class;

    /**
     * @var User Model
     */
    protected $model;

    /**
     * @var RoleRepository
     */
    protected $role;

    /**
     * Profile Pic path.
     *
     * @var string
     */
    protected $profilepic_path;

    /**
     * Storage Class Object.
     *
     * @var \Illuminate\Support\Facades\Storage
     */
    protected $storage;

    /**
     * @param RoleRepository $role
     */
    public function __construct(User $model, RoleRepository $role)
    {
        $this->model = $model;
        $this->role  = $role;
        $this->profilepic_path = 'img'.DIRECTORY_SEPARATOR.'profilepic'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }

    /**
     * @param int  $status
     * @param bool $trashed
     *
     * @return mixed
     */
    public function getForDataTable($status = 1, $trashed = false, $role = '')
    {

        /**
         * Note: You must return deleted_at or the User getActionButtonsAttribute won't
         * be able to differentiate what buttons to show for each row.
         */
        $dataTableQuery = $this->query()
        ->leftJoin('role_user', 'role_user.user_id', '=', 'users.id')
        ->leftJoin('roles', 'role_user.role_id', '=', 'roles.id')
        ->select([
            config('access.users_table') . '.id',
            config('access.users_table') . '.first_name',
            config('access.users_table') . '.profilepic',
            config('access.users_table') . '.picapproved',
            config('access.users_table') . '.last_name',
            config('access.users_table') . '.email',
            config('access.users_table') . '.phone',
            config('access.users_table') . '.address',
            config('access.users_table') . '.city',
            config('access.users_table') . '.state',
            config('access.users_table') . '.country',
            config('access.users_table') . '.zip',
            config('access.users_table') . '.latitude',
            config('access.users_table') . '.longitude',
            config('access.users_table') . '.aboutme',
            config('access.users_table') . '.search_radius',
            config('access.users_table') . '.address_2',
            config('access.users_table') . '.accountname',
            config('access.users_table') . '.adminnote',
            config('access.users_table') . '.dob',
            config('access.users_table') . '.age',
            config('access.users_table') . '.status',
            config('access.users_table') . '.confirmed',
            config('access.users_table') . '.created_at',
            config('access.users_table') . '.updated_at',
            config('access.users_table') . '.deleted_at',
            config('access.users_table') . '.pin_code',
            DB::raw('GROUP_CONCAT(roles.name) as roles'),
        ])
        ->groupBy('users.id');


        if ($trashed == 'true') {
            return $dataTableQuery->onlyTrashed();
        }

        if ($role != '') {
            $dataTableQuery = $dataTableQuery->role($role);
        }

        // active() is a scope on the UserScope trait
        return $dataTableQuery->active($status);
    }

    /**
     * Create User.
     *
     * @param Model $request
     */
    public function create($request)
    {
        $data = $request->except('assignees_roles');
        $roles = $request->get('assignees_roles');

        $permissions = in_array(2,$roles) ? [1,74,75,76,77,78,79] : [];

        // dd($permissions);

        $data = $this->uploadprofilepic($data);

        $data['pin_code'] = in_array(2, $roles) ? generatePincodeNumber() : '';

        $user = $this->createUserStub($data);

        if (!empty($data['dob'])) {
            $user->dob = $data['dob'];
            $user->age = $this->calculateAge($data);
        }

        DB::transaction(function () use ($user, $data, $roles, $permissions) {
            if ($user->save()) {

                //User Created, Validate Roles
                if (!count($roles)) {
                    throw new GeneralException(trans('exceptions.backend.access.users.role_needed_create'));
                }

                //Attach new roles
                $user->attachRoles($roles);

                // Attach New Permissions
                $user->attachPermissions($permissions);

                //Send confirmation email if requested and account approval is off
                if (isset($data['confirmation_email']) && $user->confirmed == 1) {
                    $user->notify(new UserNeedsConfirmation($user));
                }

                event(new UserCreated($user));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.access.users.create_error'));
        });
    }

    /**
     * @param Model $user
     * @param $request
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function update($user, $request)
    {
        $data        = $request->except('assignees_roles');
        $roles       = $request->get('assignees_roles');
        $permissions = $request->get('permissions');

        $this->checkUserByEmail($data, $user);

        $data['pin_code'] = (in_array(2, $roles) && is_null($user->pin_code)) ? generatePincodeNumber() : '';

        $data = $this->uploadprofilepic($data);
        if (empty($data['profilepic']) && !empty($user->profilepic)) {
            $userdata = DB::table('users')->select('profilepic')->where('id', $user->id)->first();
            $data['profilepic'] = $userdata->profilepic;
        }

        DB::transaction(function () use ($user, $data, $roles, $permissions) {

            if ($user->update($data)) {
                $user->profilepic    = $data['profilepic'];
                $user->adminnote     = $data['adminnote'];
                $user->aboutme       = $data['aboutme'];
                $user->search_radius = $data['search_radius'];
                $user->status        = isset($data['status']) && $data['status'] == '1' ? 1 : 0;
                $user->picapproved   = isset($data['picapproved']) && $data['picapproved'] == '1' ? 1 : 0;
                $user->confirmed     = isset($data['confirmed']) && $data['confirmed'] == '1' ? 1 : 0;
                $user->accountname   = $data['accountname'];
                $user->latitude      = $data['latitude'];
                $user->longitude     = $data['longitude'];
                $user->pin_code      = $data['pin_code'];
                if (!empty($data['dob'])) {
                    $user->dob = $data['dob'];
                    $user->age = $this->calculateAge($data);
                }

                $user->save();

                $this->checkUserRolesCount($roles);
                $this->flushRoles($roles, $user);


                $this->flushPermissions($permissions, $user);

                event(new UserUpdated($user));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.access.users.update_error'));
        });
    }

    protected function calculateAge($data) {
        $age = 0;
        if (!empty($data['dob'])) {
            $dob = explode('/', $data['dob']);
            $dob[0] = (int) $dob[0];
            $dob[1] = (int) $dob[1];
            $dob[2] = (int) $dob[2];
            $age = date_diff(date_create(date("d-m-Y", mktime(0,0,0,$dob[1],$dob[0],$dob[2]))), date_create('today'))->y;
        }

        return $age;
    }


    /**
     * Upload Profile Image.
     *
     * @param array $input
     *
     * @return array $input
     */
    public function uploadprofilepic($input)
    {
        if (isset($input['profilepic']) && !empty($input['profilepic'])) {
            $avatar = $input['profilepic'];
            $fileName = time().$avatar->getClientOriginalName();

            $this->storage->put($this->profilepic_path.$fileName, file_get_contents($avatar->getRealPath()));

            $input = array_merge($input, ['profilepic' => $fileName]);

        } else {
            $input = array_merge($input, ['profilepic' => '']);
        }

        return $input;
    }

    /**
     * Change Password.
     *
     * @param $user
     * @param $input
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function updatePassword($user, $input)
    {
        $user = $this->find(access()->id());

        if (Hash::check($input['old_password'], $user->password)) {
            $user->password = bcrypt($input['password']);

            if ($user->save()) {
                event(new UserPasswordChanged($user));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.access.users.update_password_error'));
        }

        throw new GeneralException(trans('exceptions.backend.access.users.change_mismatch'));
    }

    /**
     * Delete User.
     *
     * @param Model $user
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete($user)
    {
        if (access()->id() == $user->id) {
            throw new GeneralException(trans('exceptions.backend.access.users.cant_delete_self'));
        }

        if ($user->delete()) {
            event(new UserDeleted($user));

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.users.delete_error'));
    }

    /**
     * Delete All Users.
     *
     * @param Model $user
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function deleteAll($ids)
    {
        if (in_array(access()->id(), $ids)) {
            throw new GeneralException(trans('exceptions.backend.access.users.cant_delete_self'));
        }

        if (in_array(1, $ids)) {
            throw new GeneralException(trans('exceptions.backend.access.users.cant_delete_admin'));
        }

        $result = DB::table('users')->whereIn('id', $ids)->delete();

        if ($result) {
            return true;
        }

        return false;
    }

    /**
     * @param $user
     *
     * @throws GeneralException
     */
    public function forceDelete($user)
    {
        if (is_null($user->deleted_at)) {
            throw new GeneralException(trans('exceptions.backend.access.users.delete_first'));
        }

        DB::transaction(function () use ($user) {
            if ($user->forceDelete()) {
                event(new UserPermanentlyDeleted($user));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.access.users.delete_error'));
        });
    }

    /**
     * @param $user
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function restore($user)
    {
        if (is_null($user->deleted_at)) {
            throw new GeneralException(trans('exceptions.backend.access.users.cant_restore'));
        }

        if ($user->restore()) {
            event(new UserRestored($user));

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.users.restore_error'));
    }

    /**
     * @param $user
     * @param $status
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function mark($user, $status)
    {
        if (access()->id() == $user->id && $status == 0) {
            throw new GeneralException(trans('exceptions.backend.access.users.cant_deactivate_self'));
        }

        $user->status = $status;

        switch ($status) {
            case 0:
            event(new UserDeactivated($user));
            break;

            case 1:
            event(new UserReactivated($user));
            break;
        }

        if ($user->save()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.users.mark_error'));
    }

    /**
     * @param  $input
     * @param  $user
     *
     * @throws GeneralException
     */
    protected function checkUserByEmail($input, $user)
    {
        //Figure out if email is not the same
        if ($user->email != $input['email']) {
            //Check to see if email exists
            if ($this->query()->where('email', '=', $input['email'])->first()) {
                throw new GeneralException(trans('exceptions.backend.access.users.email_error'));
            }
        }
    }

    /**
     * Flush roles out, then add array of new ones.
     *
     * @param $roles
     * @param $user
     */
    protected function flushRoles($roles, $user)
    {
        //Flush roles out, then add array of new ones
        $user->detachRoles($user->roles);
        $user->attachRoles($roles);
    }

    /**
     * Flush Permissions out, then add array of new ones.
     *
     * @param $permissions
     * @param $user
     */
    protected function flushPermissions($permissions, $user)
    {
        //Flush permission out, then add array of new ones
        $user->detachPermissions($user->permissions);
        $user->attachPermissions($permissions);
    }

    /**
     * @param  $roles
     *
     * @throws GeneralException
     */
    protected function checkUserRolesCount($roles)
    {
        //User Updated, Update Roles
        //Validate that there's at least one role chosen
        if (count($roles) == 0) {
            throw new GeneralException(trans('exceptions.backend.access.users.role_needed'));
        }
    }

    /**
     * @param  $input
     *
     * @return mixed
     */
    protected function createUserStub($input)
    {
        $user                    = self::MODEL;
        $user                    = new $user();
        $user->first_name        = $input['first_name'];
        $user->last_name         = $input['last_name'];
        $user->email             = $input['email'];
        $user->phone             = $input['phone'];
        $user->address           = $input['address'];
        $user->city              = $input['city'];
        $user->state             = $input['state'];
        $user->country           = $input['country'];
        $user->zip               = $input['zip'];
        $user->latitude          = $input['latitude'];
        $user->longitude         = $input['longitude'];
        $user->search_radius     = $input['search_radius'];
        $user->profilepic        = $input['profilepic'];
        $user->accountname       = $input['accountname'];
        $user->adminnote         = $input['adminnote'];
        $user->dob               = $input['dob'];
        $user->age               = 0;
        $user->password          = bcrypt($input['password']);
        $user->status            = isset($input['status']) ? 1 : 0;
        $user->confirmation_code = md5(uniqid(mt_rand(), true));
        $user->confirmed         = isset($input['confirmed']) ? 1 : 0;
        $user->created_by        = access()->user()->id;
        $user->pin_code          = $input['pin_code'];

        return $user;
    }

    /**
     * @param $permissions
     * @param string $by
     *
     * @return mixed
     */
    public function getByPermission($permissions, $by = 'name')
    {
        if (!is_array($permissions)) {
            $permissions = [$permissions];
        }

        return $this->query()->whereHas('roles.permissions', function ($query) use ($permissions, $by) {
            $query->whereIn('permissions.' . $by, $permissions);
        })->get();
    }

    /**
     * @param $roles
     * @param string $by
     *
     * @return mixed
     */
    public function getByRole($roles, $by = 'name')
    {
        if (!is_array($roles)) {
            $roles = [$roles];
        }

        return $this->query()->whereHas('roles', function ($query) use ($roles, $by) {
            $query->whereIn('roles.' . $by, $roles);
        })->get();
    }


    /**
     * Create a new token for the user.
     *
     * @return string
     */
    public function saveToken(User $user)
    {
        $token = hash_hmac('sha256', Str::random(40), 'hashKey');

        \DB::table('password_resets')->insert([
            'email' => $user->email,
            'token' => $token,
        ]);

        return $token;
    }
}
