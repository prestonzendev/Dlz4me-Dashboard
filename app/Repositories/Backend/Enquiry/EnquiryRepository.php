<?php

namespace App\Repositories\Backend\Enquiry;

use DB;
use Carbon\Carbon;
use App\Models\Enquiry\Enquiry;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EnquiryRepository.
 */
class EnquiryRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Enquiry::class;

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
                config('module.enquiries.table').'.id',
                config('module.enquiries.table').'.name',
                config('module.enquiries.table').'.email',
                config('module.enquiries.table').'.phone',
                config('module.enquiries.table').'.body',
                config('module.enquiries.table').'.status',
                config('module.enquiries.table').'.created_at',
                config('module.enquiries.table').'.updated_at',
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
        if (Enquiry::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.enquiries.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Enquiry $enquiry
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Enquiry $enquiry, array $input)
    {
    	if ($enquiry->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.enquiries.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Enquiry $enquiry
     * @throws GeneralException
     * @return bool
     */
    public function delete(Enquiry $enquiry)
    {
        if ($enquiry->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.enquiries.delete_error'));
    }
}
