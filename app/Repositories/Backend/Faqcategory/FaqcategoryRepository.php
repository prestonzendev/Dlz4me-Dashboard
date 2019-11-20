<?php

namespace App\Repositories\Backend\Faqcategory;

use DB;
use Carbon\Carbon;
use App\Models\Faqcategory\Faqcategory;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FaqcategoryRepository.
 */
class FaqcategoryRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Faqcategory::class;

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
                config('module.faqcategories.table').'.id',
                config('module.faqcategories.table').'.name',
                config('module.faqcategories.table').'.status',
                config('module.faqcategories.table').'.created_at',
                config('module.faqcategories.table').'.updated_at',
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
        if (Faqcategory::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.faqcategories.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Faqcategory $faqcategory
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Faqcategory $faqcategory, array $input)
    {
    	if ($faqcategory->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.faqcategories.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Faqcategory $faqcategory
     * @throws GeneralException
     * @return bool
     */
    public function delete(Faqcategory $faqcategory)
    {
        if ($faqcategory->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.faqcategories.delete_error'));
    }
}
