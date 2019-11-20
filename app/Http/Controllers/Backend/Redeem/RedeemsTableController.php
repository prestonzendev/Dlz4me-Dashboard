<?php

namespace App\Http\Controllers\Backend\Redeem;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Redeem\RedeemRepository;
use App\Http\Requests\Backend\Redeem\ManageRedeemRequest;

/**
 * Class redeemsTableController.
 */
class redeemsTableController extends Controller {

    /**
     * variable to store the repository object
     * @var RedeemRepository
     */
    protected $Redeem;

    /**
     * contructor to initialize repository object
     * @param RedeemRepository $Redeem;
     */
    public function __construct(RedeemRepository $Redeem) {
        $this->Redeem = $Redeem;
    }

    /**
     * This method return the data of the model
     * @param ManageRedeemRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageRedeemRequest $request) {
        return Datatables::of($this->Redeem->getForDataTable(''))
                        ->escapeColumns(['id'])
                        ->addColumn('status', function ($Redeem) {
                            return $Redeem->status;
                        })
                        ->addColumn('created_at', function ($Redeem) {
                            return Carbon::parse($Redeem->created_at)->toDateString();
                        })
                        ->addColumn('actions', function ($Redeem) {
                            return $Redeem->action_buttons;
                        })
                        ->make(true);
    }

}
