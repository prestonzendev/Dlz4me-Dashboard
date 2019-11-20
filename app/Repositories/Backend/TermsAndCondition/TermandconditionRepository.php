<?php

namespace App\Repositories\Backend\TermsAndCondition;

use App\Exceptions\GeneralException;
use App\Models\TermsAndCondition\Termandcondition;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TermandconditionRepository.
 */
class TermandconditionRepository extends BaseRepository
{

    /**
     * Associated Repository Model.
     */
    const MODEL = Termandcondition::class;

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
                            config('module.termandconditions.table') . '.id',
                            config('module.termandconditions.table') . '.title',
                            config('module.termandconditions.table') . '.type_id',
                            config('module.termandconditions.table') . '.description',
                            config('module.termandconditions.table') . '.is_latest',
                            config('module.termandconditions.table') . '.status',
                            config('module.termandconditions.table') . '.created_at',
                            config('module.termandconditions.table') . '.updated_at',
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
        $input['is_latest'] = 1;
        if (Termandcondition::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.termandconditions.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Termandcondition $termandcondition
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Termandcondition $termandcondition, array $input)
    {
        $terms_and_conditions = Termandcondition::where('type_id', $input['type_id'])->get();
        if ($terms_and_conditions->count() && !empty($input['status'])) {
            foreach ($terms_and_conditions as $var) {
                $var->is_latest = 0;
                $var->status = 0;
                $var->save();
            }
            $input['is_latest'] = 1;
            $input['status'] = 1;
            if (Termandcondition::create($input)) {
                return true;
            }
        } else {
            $input['status'] = 0;
            if ($termandcondition->update($input)) {
                return true;
            }
        }
        throw new GeneralException(trans('exceptions.backend.termandconditions.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Termandcondition $termandcondition
     * @throws GeneralException
     * @return bool
     */
    public function delete(Termandcondition $termandcondition)
    {
        if ($termandcondition->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.termandconditions.delete_error'));
    }
}
