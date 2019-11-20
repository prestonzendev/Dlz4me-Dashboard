<?php

namespace App\Repositories\Backend\Reportedissue;

use DB;
use Carbon\Carbon;
use App\Models\Reportedissue\Reportedissue;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ReportedissueRepository.
 */
class ReportedissueRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Reportedissue::class;

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
                config('module.reportedissues.table').'.id', 
                config('module.reportedissues.table').'.name',
                config('module.reportedissues.table').'.email',
                config('module.reportedissues.table').'.phone', 
                config('module.reportedissues.table').'.body',
                config('module.reportedissues.table').'.status',
                config('module.reportedissues.table').'.created_at',
                config('module.reportedissues.table').'.updated_at',
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
        if (Reportedissue::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.reportedissues.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Reportedissue $reportedissue
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Reportedissue $reportedissue, array $input)
    {
    	if ($reportedissue->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.reportedissues.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Reportedissue $reportedissue
     * @throws GeneralException
     * @return bool
     */
    public function delete(Reportedissue $reportedissue)
    {
        if ($reportedissue->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.reportedissues.delete_error'));
    }
}
