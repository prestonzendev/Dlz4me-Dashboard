<?php

namespace App\Http\Controllers\Backend\Subscriptionplan;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Subscriptionplan\SubscriptionplanRepository;
use App\Http\Requests\Backend\Subscriptionplan\ManageSubscriptionplanRequest;

/**
 * Class SubscriptionplansTableController.
 */
class SubscriptionplansTableController extends Controller {

    /**
     * variable to store the repository object
     * @var SubscriptionplanRepository
     */
    protected $subscriptionplan;

    /**
     * contructor to initialize repository object
     * @param SubscriptionplanRepository $subscriptionplan;
     */
    public function __construct(SubscriptionplanRepository $subscriptionplan) {
        $this->subscriptionplan = $subscriptionplan;
    }

    /**
     * This method return the data of the model
     * @param ManageSubscriptionplanRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageSubscriptionplanRequest $request) {
        return Datatables::of($this->subscriptionplan->getForDataTable())
                        ->escapeColumns(['id'])
                        ->addColumn('created_at', function ($subscriptionplan) {
                            return Carbon::parse($subscriptionplan->created_at)->toDateString();
                        })
                        ->addColumn('status', function ($subscriptionplan) {
                            return $subscriptionplan->status_label;
                        })
                        ->addColumn('price', function ($subscriptionplan) {
                            return $subscriptionplan->price_with_currency;
                        })
                        ->addColumn('actions', function ($subscriptionplan) {
                            return $subscriptionplan->action_buttons;
                        })
                        ->make(true);
    }

}
