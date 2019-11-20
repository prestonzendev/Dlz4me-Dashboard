<?php

namespace App\Repositories\Backend\Event;

use DB;
use Carbon\Carbon;
use App\Models\Event\Event;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EventRepository.
 */
class EventRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Event::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->leftJoin('role_user', 'role_user.user_id', '=', 'notifications.user_id')
            ->leftJoin('roles', 'role_user.role_id', '=', 'roles.id')
            ->select([
                config('module.events.table').'.id',
                config('module.events.table').'.message',
                config('module.events.table').'.created_at',
                DB::raw('roles.name as roles'),
            ]);
    }
}
