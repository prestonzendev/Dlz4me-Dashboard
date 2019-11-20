<?php

namespace App\Http\Controllers\Backend\Enquiry;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Enquiry\EnquiryRepository;
use App\Http\Requests\Backend\Enquiry\ManageEnquiryRequest;

/**
 * Class EnquiriesTableController.
 */
class EnquiriesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var EnquiryRepository
     */
    protected $enquiry;

    /**
     * contructor to initialize repository object
     * @param EnquiryRepository $enquiry;
     */
    public function __construct(EnquiryRepository $enquiry)
    {
        $this->enquiry = $enquiry;
    }

    /**
     * This method return the data of the model
     * @param ManageEnquiryRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageEnquiryRequest $request)
    {
        return Datatables::of($this->enquiry->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($enquiry) {
                return Carbon::parse($enquiry->created_at)->toDateString();
            })
            ->addColumn('actions', function ($enquiry) {
                return $enquiry->action_buttons;
            })
            ->make(true);
    }
}
