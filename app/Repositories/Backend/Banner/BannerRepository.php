<?php

namespace App\Repositories\Backend\Banner;

use DB;
use Carbon\Carbon;
use App\Models\Banner\Banner;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class BannerRepository.
 */
class BannerRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Banner::class;

    /**
     * Favicon path.
     *
     * @var string
     */
    protected $banner_path;

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
        $this->banner_path = 'img'.DIRECTORY_SEPARATOR.'banner'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.banners.table').'.id',
                config('module.banners.table').'.title',
                config('module.banners.table').'.status',
                config('module.banners.table').'.bannerfile',
                config('module.banners.table').'.description',
                config('module.banners.table').'.created_at',
                config('module.banners.table').'.updated_at',
            ]);
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
        $input = $this->uploadbanner($input);

        if (Banner::create($input)) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.banners.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Banner $banner
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Banner $banner, array $input)
    {
        
        if (array_key_exists('bannerfile', $input)) {
            $input = $this->uploadbanner($input);
        }

    	if ($banner->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.banners.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Banner $banner
     * @throws GeneralException
     * @return bool
     */
    public function delete(Banner $banner)
    {
        if ($banner->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.banners.delete_error'));
    }


    /**
     * Upload Banner Image.
     *
     * @param array $input
     *
     * @return array $input
     */
    public function uploadbanner($input)
    {
        $avatar = $input['bannerfile'];

        if (isset($input['bannerfile']) && !empty($input['bannerfile'])) {
            $fileName = time().$avatar->getClientOriginalName();

            $this->storage->put($this->banner_path.$fileName, file_get_contents($avatar->getRealPath()));

            $input = array_merge($input, ['bannerfile' => $fileName]);

            return $input;
        }
    }

}
