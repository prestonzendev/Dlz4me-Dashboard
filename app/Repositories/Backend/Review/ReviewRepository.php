<?php

namespace App\Repositories\Backend\Review;

use DB;
use Carbon\Carbon;
use App\Models\Review\Review;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class ReviewRepository.
 */
class ReviewRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Review::class;

    /**
     * Favicon path.
     *
     * @var string
     */
    protected $reviewPhoto;

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
        $this->reviewPhoto = 'img'.DIRECTORY_SEPARATOR.'review'.DIRECTORY_SEPARATOR;
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
                config('module.reviews.table').'.id',
                config('module.reviews.table').'.photo',
                config('module.reviews.table').'.name',
                config('module.reviews.table').'.grade',
                config('module.reviews.table').'.message',
                config('module.reviews.table').'.status',
                config('module.reviews.table').'.created_at',
                config('module.reviews.table').'.updated_at',
                config('module.reviews.table').'.deleted_at',
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
        $input = $this->uploadphoto($input);

        if (Review::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.reviews.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Review $review
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Review $review, array $input)
    {
        if (array_key_exists('photo', $input)) {
            $input = $this->uploadphoto($input);
        }

    	if ($review->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.reviews.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Review $review
     * @throws GeneralException
     * @return bool
     */
    public function delete(Review $review)
    {
        if ($review->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.reviews.delete_error'));
    }

    /**
     * Upload photo Image file.
     *
     * @param array $input
     *
     * @return array $input
     */
    public function uploadphoto($input)
    {
        $avatar = $input['photo'];

        if (isset($input['photo']) && !empty($input['photo'])) {
            $fileName = time().$avatar->getClientOriginalName();

            $this->storage->put($this->reviewPhoto.$fileName, file_get_contents($avatar->getRealPath()));

            $input = array_merge($input, ['photo' => $fileName]);

            return $input;
        }
    }
}
