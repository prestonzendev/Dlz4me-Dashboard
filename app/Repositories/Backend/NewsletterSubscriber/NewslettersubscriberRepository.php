<?php

namespace App\Repositories\Backend\NewsletterSubscriber;

use DB;
use Carbon\Carbon;
use App\Models\NewsletterSubscriber\Newslettersubscriber;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class NewslettersubscriberRepository.
 */
class NewslettersubscriberRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Newslettersubscriber::class;

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
                config('module.newslettersubscribers.table').'.id',
                config('module.newslettersubscribers.table').'.email',
                config('module.newslettersubscribers.table').'.status',
                config('module.newslettersubscribers.table').'.created_at',
                config('module.newslettersubscribers.table').'.updated_at',
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
        if (Newslettersubscriber::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.newslettersubscribers.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Newslettersubscriber $newslettersubscriber
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Newslettersubscriber $newslettersubscriber, array $input)
    {
        if ($newslettersubscriber->update($input)) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.newslettersubscribers.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Newslettersubscriber $newslettersubscriber
     * @throws GeneralException
     * @return bool
     */
    public function delete(Newslettersubscriber $newslettersubscriber)
    {
        if ($newslettersubscriber->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.newslettersubscribers.delete_error'));
    }
}
