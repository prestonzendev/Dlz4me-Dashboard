<?php

namespace App\Repositories\Backend\MembershipDetail;

use DB;
use Carbon\Carbon;
use App\Models\MembershipDetail\Membershipdetail;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MembershipdetailRepository.
 */
class MembershipdetailRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Membershipdetail::class;

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
                config('module.membershipdetails.table').'.id',
                config('module.membershipdetails.table').'.membership_level',
                config('module.membershipdetails.table').'.title',
                config('module.membershipdetails.table').'.description',
                config('module.membershipdetails.table').'.price',
                config('module.membershipdetails.table').'.status',
                config('module.membershipdetails.table').'.created_at',
                config('module.membershipdetails.table').'.updated_at',
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
        if (Membershipdetail::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.membershipdetails.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Membershipdetail $membershipdetail
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Membershipdetail $membershipdetail, array $input)
    {
        if ($membershipdetail->update($input)) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.membershipdetails.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Membershipdetail $membershipdetail
     * @throws GeneralException
     * @return bool
     */
    public function delete(Membershipdetail $membershipdetail)
    {
        if ($membershipdetail->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.membershipdetails.delete_error'));
    }
}
