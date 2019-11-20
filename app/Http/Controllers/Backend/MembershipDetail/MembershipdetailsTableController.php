<?php

namespace App\Http\Controllers\Backend\MembershipDetail;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\MembershipDetail\MembershipdetailRepository;
use App\Http\Requests\Backend\MembershipDetail\ManageMembershipdetailRequest;

/**
 * Class MembershipdetailsTableController.
 */
class MembershipdetailsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var MembershipdetailRepository
     */
    protected $membershipdetail;

    /**
     * contructor to initialize repository object
     * @param MembershipdetailRepository $membershipdetail;
     */
    public function __construct(MembershipdetailRepository $membershipdetail)
    {
        $this->membershipdetail = $membershipdetail;
    }

    /**
     * This method return the data of the model
     * @param ManageMembershipdetailRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageMembershipdetailRequest $request)
    {
        return Datatables::of($this->membershipdetail->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($membershipdetail) {
                return Carbon::parse($membershipdetail->created_at)->toDateString();
            })
            ->addColumn('actions', function ($membershipdetail) {
                return $membershipdetail->action_buttons;
            })
            ->make(true);
    }
}
