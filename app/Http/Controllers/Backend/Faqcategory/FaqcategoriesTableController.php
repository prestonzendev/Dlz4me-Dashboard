<?php

namespace App\Http\Controllers\Backend\Faqcategory;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Faqcategory\FaqcategoryRepository;
use App\Http\Requests\Backend\Faqcategory\ManageFaqcategoryRequest;

/**
 * Class FaqcategoriesTableController.
 */
class FaqcategoriesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var FaqcategoryRepository
     */
    protected $faqcategory;

    /**
     * contructor to initialize repository object
     * @param FaqcategoryRepository $faqcategory;
     */
    public function __construct(FaqcategoryRepository $faqcategory)
    {
        $this->faqcategory = $faqcategory;
    }

    /**
     * This method return the data of the model
     * @param ManageFaqcategoryRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageFaqcategoryRequest $request)
    {
        return Datatables::of($this->faqcategory->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($faqcategory) {
                return Carbon::parse($faqcategory->created_at)->toDateString();
            })
            ->addColumn('actions', function ($faqcategory) {
                return $faqcategory->action_buttons;
            })
            ->make(true);
    }
}
