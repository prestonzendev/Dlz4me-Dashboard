<?php

namespace App\Repositories\Backend\Usersubscriptionplan;

use DB;
use Carbon\Carbon;
use App\Models\Usersubscriptionplan\Usersubscriptionplan;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UsersubscriptionplanRepository.
 */
class UsersubscriptionplanRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Usersubscriptionplan::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->leftJoin('users', config('module.usersubscriptionplans.table') . '.user_id', '=', 'users.id')
            ->select([
                config('module.usersubscriptionplans.table').'.id',
                config('module.usersubscriptionplans.table').'.user_id',
                config('module.usersubscriptionplans.table').'.transactionid',
                config('module.usersubscriptionplans.table').'.plan_id',
                config('module.usersubscriptionplans.table').'.paid',
                config('module.usersubscriptionplans.table').'.paystatus',
                config('module.usersubscriptionplans.table').'.title',
                config('module.usersubscriptionplans.table').'.price',
                config('module.usersubscriptionplans.table').'.usercount',
                config('module.usersubscriptionplans.table').'.duration',
                config('module.usersubscriptionplans.table').'.status',
                config('module.usersubscriptionplans.table').'.expiry_date',
                config('module.usersubscriptionplans.table').'.created_at',
                config('module.usersubscriptionplans.table').'.updated_at',
                DB::raw('CONCAT(users.first_name, " ", users.last_name) as username'),
                DB::raw('users.first_name'),
                DB::raw('users.last_name'),
                DB::raw('users.email'),
                DB::raw('users.phone'),
            ])
            ->where('paystatus', '<>', 'initiated');
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {
        if (Usersubscriptionplan::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.usersubscriptionplans.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Usersubscriptionplan $usersubscriptionplan
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Usersubscriptionplan $usersubscriptionplan, array $input)
    {
    	if ($usersubscriptionplan->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.usersubscriptionplans.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Usersubscriptionplan $usersubscriptionplan
     * @throws GeneralException
     * @return bool
     */
    public function delete(Usersubscriptionplan $usersubscriptionplan)
    {
        if ($usersubscriptionplan->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.usersubscriptionplans.delete_error'));
    }
}
