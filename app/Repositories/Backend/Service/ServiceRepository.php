<?php

namespace App\Repositories\Backend\Service;

use DB;
use Carbon\Carbon;
use App\Models\Service\Service;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use URL;
/**
 * Class ServiceRepository.
 */
class ServiceRepository extends BaseRepository
{

    /**
     * Associated Repository Model.
     */
    const MODEL = Service::class;

    protected $image_path;

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
        $this->image_path = 'img'.DIRECTORY_SEPARATOR.'offer'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable($a)
    {
        $q = $this->query()
                        ->select([
                            config('module.services.table') . '.id',
                            config('module.services.table') . '.name',
                            config('module.services.table') . '.image',
                            config('module.services.table') . '.title',
                            config('module.services.table') . '.status',
                            config('module.services.table') . '.is_featured',
                            config('module.services.table') . '.created_at',
                            config('module.services.table') . '.updated_at',
                        ]);
        if($a!='') {
            $q->where('is_featured',$a);
        }
        if (!access()->user()->hasRole('Admin')) {
            $q->where('vendor_id', access()->user()->id);
        }
        return $q;
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
        $input = $this->uploadimage($input);
        $newCategory = $this->createCategory($input['categories']);
        unset($input['categories']);

        DB::transaction(function () use ($input, $newCategory) {
            if ($service = Service::create($input)) {
                // Inserting associated category's id in mapper table
                if ($newCategory) {
                    $service->categories()->sync($newCategory);
                }
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.services.create_error'));
        });
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Service $service
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Service $service, array $input)
    {
       /* $token = str_random(60);
        $new_url = $input['url'];
        $new_url .= '/offer/'.$token;
        dd($new_url);

        dd($input);*/
        if (array_key_exists('image', $input)) {
            $input = $this->uploadimage($input);
        }

        $newCategory = $this->createCategory($input['categories']);
        unset($input['categories']);

        DB::transaction(function () use ($service, $input, $newCategory) {
            if ($service->update($input)) {
                // Inserting associated category's id in mapper table
                if ($newCategory) {
                    $service->categories()->sync($newCategory);
                }
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.services.update_error'));
        });
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Service $service
     * @throws GeneralException
     * @return bool
     */
    public function delete(Service $service)
    {
        if ($service->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.services.delete_error'));
    }

    /**
     * Creating Categories.
     *
     * @param Array($categories)
     *
     * @return array
     */
    /*public function createCategories($categories)
    {
        //Creating a new array for categories (newly created)
        $categories_array = [];

        foreach ($categories as $category) {
            if (is_numeric($category)) {
                $categories_array[] = $category;
            } else {
                $newCategory = \App\Models\ServiceCategory\Servicecategory::create(['name' => $category, 'status' => 1]);

                $categories_array[] = $newCategory->id;
            }
        }

        return $categories_array;
    }*/

    public function createCategory($category)
    {
        $new_category = '';

        if (is_numeric($category)) {
            $new_category = $category;
        } else {
            $newCategory = \App\Models\ServiceCategory\Servicecategory::create(['name' => $category, 'status' => 1]);
            $new_category = $newCategory->id;
        }

        return $category;
    }

    public function uploadimage($input)
    {
        $avatar = $input['image'];

        if (isset($input['image']) && !empty($input['image'])) {
            $fileName = time().$avatar->getClientOriginalName();

            $this->storage->put($this->image_path.$fileName, file_get_contents($avatar->getRealPath()));

            $input = array_merge($input, ['image' => $fileName, 'image_path' => URL::to("/").'/storage/app/public/img/offer/'.$fileName]);

            return $input;
        }
    }
}
