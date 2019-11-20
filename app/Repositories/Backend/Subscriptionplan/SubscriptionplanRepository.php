<?php

namespace App\Repositories\Backend\Subscriptionplan;

use DB;
use Carbon\Carbon;
use App\Models\Subscriptionplan\Subscriptionplan;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SubscriptionplanRepository.
 */
class SubscriptionplanRepository extends BaseRepository {

    /**
     * Associated Repository Model.
     */
    const MODEL = Subscriptionplan::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable() {
        return $this->query()
                        ->select([
                            config('module.subscriptionplans.table') . '.id',
                            config('module.subscriptionplans.table') . '.title',
                            config('module.subscriptionplans.table') . '.price',
                            config('module.subscriptionplans.table') . '.usercount',
                            config('module.subscriptionplans.table') . '.duration',
                            config('module.subscriptionplans.table') . '.status',
                            config('module.subscriptionplans.table') . '.stripe_id',
                            config('module.subscriptionplans.table') . '.strip_test_id',
                            config('module.subscriptionplans.table') . '.created_at',
                            config('module.subscriptionplans.table') . '.updated_at',
        ]);
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input) {
        $input['status'] = isset($input['status']) ? 1 : 0;

        $subsCreate = Subscriptionplan::create($input);
        if ($subsCreate && !empty($input['subscriptionPlansFeature'])) {
            $subsCreate->subscriptionPlansFeatures()->createMany($input['subscriptionPlansFeature']);
        }

        if ($subsCreate) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.subscriptionplans.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Subscriptionplan $subscriptionplan
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Subscriptionplan $subscriptionplan, array $input) {
        $input['status'] = isset($input['status']) ? 1 : 0;

        $subsUpdate = $subscriptionplan->update($input);

        if ($subsUpdate && !empty($input['subscriptionPlansFeature'])) {

            $data = $input['subscriptionPlansFeature'];
            if (count($data)) {
                foreach ($data as $val) {
                    if (isset($val['id'])) {
                        $subscriptionplan->subscriptionPlansFeatures()->where(['id' => $val['id']])->update(['description' => $val['description']]);
                    } else {
                        $subscriptionplan->subscriptionPlansFeatures()->create($val);
                    }
                }
            }
        }

        if ($subsUpdate)
            return true;

        throw new GeneralException(trans('exceptions.backend.subscriptionplans.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Subscriptionplan $subscriptionplan
     * @throws GeneralException
     * @return bool
     */
    public function delete(Subscriptionplan $subscriptionplan) {
        if ($subscriptionplan->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.subscriptionplans.delete_error'));
    }

}
