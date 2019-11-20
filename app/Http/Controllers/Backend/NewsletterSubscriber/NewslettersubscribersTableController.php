<?php

namespace App\Http\Controllers\Backend\NewsletterSubscriber;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\NewsletterSubscriber\NewslettersubscriberRepository;
use App\Http\Requests\Backend\NewsletterSubscriber\ManageNewslettersubscriberRequest;

/**
 * Class NewslettersubscribersTableController.
 */
class NewslettersubscribersTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var NewslettersubscriberRepository
     */
    protected $newslettersubscriber;

    /**
     * contructor to initialize repository object
     * @param NewslettersubscriberRepository $newslettersubscriber;
     */
    public function __construct(NewslettersubscriberRepository $newslettersubscriber)
    {
        $this->newslettersubscriber = $newslettersubscriber;
    }

    /**
     * This method return the data of the model
     * @param ManageNewslettersubscriberRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageNewslettersubscriberRequest $request)
    {
        return Datatables::of($this->newslettersubscriber->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($newslettersubscriber) {
                return Carbon::parse($newslettersubscriber->created_at)->toDateString();
            })
            ->addColumn('actions', function ($newslettersubscriber) {
                return $newslettersubscriber->action_buttons;
            })
            ->make(true);
    }
}
