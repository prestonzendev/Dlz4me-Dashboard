<?php

namespace App\Repositories\Backend\Redeem;

use DB;
use Carbon\Carbon;
use App\Models\Redeem\Redeem;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use URL;
/**
 * Class RedeemRepository.
 */
class RedeemRepository extends BaseRepository
{

    /**
     * Associated Repository Model.
     */
    const MODEL = Redeem::class;

    /**
     * Constructor.
     */

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable($a)
    {
        $q = $this->query()
                        ->leftJoin('users', 'redeems.user_id', '=', 'users.id')
                        ->leftJoin('bank_accounts', 'redeems.bank_account_id', '=', 'bank_accounts.id')
                        ->select([
                            config('module.redeems.table') . '.id',
                            config('module.users.table') . '.accountname',
                            config('module.bank_accounts.table') . '.bank_name',
                            config('module.redeems.table') . '.bank_account_id',
                            config('module.redeems.table') . '.amount',
                            config('module.redeems.table') . '.status',
                            config('module.redeems.table') . '.created_at',
                            config('module.redeems.table') . '.updated_at',
                        ]);
        return $q;
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Redeem $Redeem
     * @param  $input
     * @throws GeneralException
     * return bool
     */

    public function create(array $input)
    {
        $redeem = Redeem::create($input);
        throw new GeneralException(trans('exceptions.backend.redeems.create_error'));
    }


    public function update(Redeem $redeem, array $input)
    {
        $redeem->update($input);
        throw new GeneralException(trans('exceptions.backend.redeems.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Redeem $Redeem
     * @throws GeneralException
     * @return bool
     */   
}
