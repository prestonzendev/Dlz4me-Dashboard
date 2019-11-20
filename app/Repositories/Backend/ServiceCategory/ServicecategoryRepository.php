<?php

namespace App\Repositories\Backend\ServiceCategory;

use URL;
use DB;
use Carbon\Carbon;
use App\Models\ServiceCategory\Servicecategory;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class ServicecategoryRepository.
 */
class ServicecategoryRepository extends BaseRepository {

    /**
     * Associated Repository Model.
     */
    const MODEL = Servicecategory::class;

    /**
     * Favicon path.
     *
     * @var string
     */
    protected $categoryimage_path;

    /**
     * Storage Class Object.
     *
     * @var \Illuminate\Support\Facades\Storage
     */
    protected $storage;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->categoryimage_path = 'img'.DIRECTORY_SEPARATOR.'category'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable() {
        return $this->query()
                        ->select([
                            config('module.servicecategories.table') . '.id',
                            config('module.servicecategories.table') . '.name',
                            config('module.servicecategories.table') . '.image',
                            config('module.servicecategories.table') . '.status',
                            config('module.servicecategories.table') . '.created_at',
                            config('module.servicecategories.table') . '.updated_at',
        ]);
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input) {

        $input = $this->uploadimage($input);
        if (Servicecategory::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.servicecategories.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Servicecategory $servicecategory
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Servicecategory $servicecategory, array $input) {
        if (array_key_exists('image', $input)) {
            $input = $this->uploadimage($input);
        }

        if ($servicecategory->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.servicecategories.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Servicecategory $servicecategory
     * @throws GeneralException
     * @return bool
     */
    public function delete(Servicecategory $servicecategory) {
        if ($servicecategory->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.servicecategories.delete_error'));
    }

    public function uploadimage($input)
    {
        $avatar = $input['image'];

        if (isset($input['image']) && !empty($input['image'])) {
            $fileName = time().$avatar->getClientOriginalName();

            $this->storage->put($this->categoryimage_path.$fileName, file_get_contents($avatar->getRealPath()));
            $input = array_merge($input, ['image' => $fileName]);
            $input = array_merge($input, ['image_path' => URL::to("/").'/storage/app/public/img/category/'.$fileName]);

            return $input;
        }
    }

}
