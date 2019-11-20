<?php

namespace App\Repositories\Backend\Testmod;

use DB;
use Carbon\Carbon;
use App\Models\Testmod\Testmod;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TestmodRepository.
 */
class TestmodRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Testmod::class;

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
                config('module.testmods.table').'.id',
                config('module.testmods.table').'.created_at',
                config('module.testmods.table').'.updated_at',
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
        if (Testmod::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.testmods.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Testmod $testmod
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Testmod $testmod, array $input)
    {
    	if ($testmod->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.testmods.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Testmod $testmod
     * @throws GeneralException
     * @return bool
     */
    public function delete(Testmod $testmod)
    {
        if ($testmod->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.testmods.delete_error'));
    }
}
