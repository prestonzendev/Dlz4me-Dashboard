<?php

namespace App\Repositories\Backend\Preferencesoption;

use DB;
use Carbon\Carbon;
use App\Models\Preferencesoption\Preferencesoption;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PreferencesoptionRepository.
 */
class PreferencesoptionRepository extends BaseRepository {

    /**
     * Associated Repository Model.
     */
    const MODEL = Preferencesoption::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable() {
        return $this->query()
            ->select([
                config('module.preferencesoptions.table') . '.id',
                config('module.preferencesoptions.table') . '.title',
                config('module.preferencesoptions.table') . '.slug',
                config('module.preferencesoptions.table') . '.displayorder',
                config('module.preferencesoptions.table') . '.displaytype',
                config('module.preferencesoptions.table') . '.status',
                config('module.preferencesoptions.table') . '.created_at',
                config('module.preferencesoptions.table') . '.updated_at',
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
        if (isset($input['title']) ) {
            $slug = preg_replace('/[^A-Za-z0-9\. -]/', '', trim($input['title']));
            $slug = preg_replace('/  */', '_', $slug);
            $slug = strtolower(str_replace(' ', '_', $slug));
            $input['slug'] = $slug;
        }
        
        $preferencesoptionCreate = Preferencesoption::create($input);
        if (!empty($input['preferencesOptionsValue'])) {
            $preferencesoptionCreate->preferencesOptionsValue()->createMany($input['preferencesOptionsValue']);
        }
        if ($preferencesoptionCreate)
            return true;
        throw new GeneralException(trans('exceptions.backend.preferencesoptions.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Preferencesoption $preferencesoption
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Preferencesoption $preferencesoption, array $input) {
        //dd($input['preferencesOptionsValue']);
        
        $input['status'] = isset($input['status']) ? 1 : 0;
        $preferencesoptionUpdate = $preferencesoption->update($input);

        if (!empty($input['preferencesOptionsValue'])) {

            $data = $input['preferencesOptionsValue'];
            if (count($data)) {
                foreach ($data as $val) {
                    if (isset($val['id'])) {
                        $preferencesoption->preferencesOptionsValue()->where(['id' => $val['id']])->update(['title' => $val['title'] ]);
                    } else {
                        $preferencesoption->preferencesOptionsValue()->create($val);
                    }
                }
            }
        }
        if ($preferencesoptionUpdate)
            return true;

        throw new GeneralException(trans('exceptions.backend.preferencesoptions.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Preferencesoption $preferencesoption
     * @throws GeneralException
     * @return bool
     */
    public function delete(Preferencesoption $preferencesoption) {
        if ($preferencesoption->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.preferencesoptions.delete_error'));
    }

}
