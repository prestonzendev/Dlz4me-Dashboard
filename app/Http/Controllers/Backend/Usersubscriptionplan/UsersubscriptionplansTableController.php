<?php

namespace App\Http\Controllers\Backend\Usersubscriptionplan;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Usersubscriptionplan\UsersubscriptionplanRepository;
use App\Http\Requests\Backend\Usersubscriptionplan\ManageUsersubscriptionplanRequest;

/**
 * Class UsersubscriptionplansTableController.
 */
class UsersubscriptionplansTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var UsersubscriptionplanRepository
     */
    protected $usersubscriptionplan;

    /**
     * contructor to initialize repository object
     * @param UsersubscriptionplanRepository $usersubscriptionplan;
     */
    public function __construct(UsersubscriptionplanRepository $usersubscriptionplan)
    {
        $this->usersubscriptionplan = $usersubscriptionplan;
    }

    /**
     * This method return the data of the model
     * @param ManageUsersubscriptionplanRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageUsersubscriptionplanRequest $request)
    {
        //dd($request->all());
        return Datatables::of($this->usersubscriptionplan->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($usersubscriptionplan) {
                return Carbon::parse($usersubscriptionplan->created_at)->toDateString();
            })
            ->addColumn('actions', function ($usersubscriptionplan) {
                return $usersubscriptionplan->action_buttons;
            })
            ->make(true);
    }
}
