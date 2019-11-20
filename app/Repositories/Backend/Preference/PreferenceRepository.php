<?php

namespace App\Repositories\Backend\Preference;

use DB;
use Carbon\Carbon;
use App\Models\Preference\Preference;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PreferenceRepository.
 */
class PreferenceRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Preference::class;

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
                config('module.preferences.table').'.id',
                config('module.preferences.table').'.title',
                config('module.preferences.table').'.is_active',
                config('module.preferences.table').'.created_at',
                config('module.preferences.table').'.updated_at',
            ])
            ->where('is_deleted', 0);
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
        $input['is_active'] = isset($input['is_active']) ? 1 : 0;
        if (Preference::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.preferences.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Preference $preference
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Preference $preference, array $input)
    {
        $input['is_active'] = isset($input['is_active']) ? 1 : 0;
    	if ($preference->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.preferences.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Preference $preference
     * @throws GeneralException
     * @return bool
     */
    public function delete(Preference $preference)
    {
        if ($preference->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.preferences.delete_error'));
    }
}
