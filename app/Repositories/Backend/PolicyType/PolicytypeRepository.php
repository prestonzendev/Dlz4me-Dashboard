<?php

namespace App\Repositories\Backend\PolicyType;

use DB;
use Carbon\Carbon;
use App\Models\PolicyType\Policytype;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PolicytypeRepository.
 */
class PolicytypeRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Policytype::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.policytypes.table').'.id',
                config('module.policytypes.table').'.name',
                config('module.policytypes.table').'.status',
                config('module.policytypes.table').'.created_at',
                config('module.policytypes.table').'.updated_at',
            ]);
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
        if (Policytype::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.policytypes.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Policytype $policytype
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Policytype $policytype, array $input)
    {
        if ($policytype->update($input)) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.policytypes.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Policytype $policytype
     * @throws GeneralException
     * @return bool
     */
    public function delete(Policytype $policytype)
    {
        if ($policytype->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.policytypes.delete_error'));
    }
}
