<?php

namespace App\Repositories\Backend\Settings;

use App\Exceptions\GeneralException;
use App\Models\Settings\Setting;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Storage;

/**
 * Class SettingsRepository.
 */
class SettingsRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Setting::class;

    /**
     * Site Logo Path.
     *
     * @var string
     */
    protected $site_logo_path;

    /**
     * Favicon path.
     *
     * @var string
     */
    protected $favicon_path;

    /**
     * Contact img path.
     *
     * @var string
     */
    protected $contact_img_path;

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
        $this->site_logo_path = 'img'.DIRECTORY_SEPARATOR.'logo'.DIRECTORY_SEPARATOR;
        $this->favicon_path = 'img'.DIRECTORY_SEPARATOR.'favicon'.DIRECTORY_SEPARATOR;
        $this->contact_img_path = 'img'.DIRECTORY_SEPARATOR.'contact'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }

    /**
     * @param \App\Models\Settings\Setting $setting
     * @param array                        $input
     *
     * @throws \App\Exceptions\GeneralException
     *
     * @return bool
     */
    public function update(Setting $setting, array $input)
    {
        if (!empty($input['logo'])) {
            $this->removeLogo($setting, 'logo');

            $input['logo'] = $this->uploadLogo($setting, $input['logo'], 'logo');
        }

        if (!empty($input['favicon'])) {
            $this->removeLogo($setting, 'favicon');

            $input['favicon'] = $this->uploadLogo($setting, $input['favicon'], 'favicon');
        }

        $text_content = [];
        if (isset($input['footer_text'])) {
            $text_content['footer_text'] = $input['footer_text'];
        }
        if (isset($input['copyright_text'])) {
            $text_content['copyright_text'] = $input['copyright_text'];
        }
        if (isset($input['cookies_text'])) {
            $text_content['cookies_text'] = $input['cookies_text'];
        }
        if (isset($input['notice_text'])) {
            $text_content['notice_text'] = $input['notice_text'];
        }
        if (isset($input['dontgo_text'])) {
            $text_content['dontgo_text'] = $input['dontgo_text'];
        }
        if (isset($input['nomoney_text'])) {
            $text_content['nomoney_text'] = $input['nomoney_text'];
        }

        if (!isset($input['referral_status'])) {
           $input['referral_status'] = 0;
        }
        $currencycodes = [];
        $currencycodes['dollor'] = (isset($input['dollorcode'])) ? $input['dollorcode'] : $input['dollor'];
        $currencycodes['EUR'] = (isset($input['eurocode'])) ? $input['eurocode'] : $input['euro'];
        $currencycodes['CFA'] = (isset($input['cfacode'])) ? $input['cfacode'] : $input['cfa'];
        $currencycodes['NGN'] = (isset($input['nairacode'])) ? $input['nairacode'] : $input['ngn'];
        $currencycodes['GHS'] = (isset($input['cedicode'])) ? $input['cedicode'] : $input['cedi'];

        $input['text_content'] = serialize($text_content);
        $input['currencycodes'] = serialize($currencycodes);

        if ($setting->update($input)) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.settings.update_error'));
    }

    public function getImgPath($type) {
        switch ($type) {
            case 'contact_img': $path = $this->contact_img_path;
                break;
            case 'logo': $path = $this->site_logo_path;
                break;
            default: $path = $this->favicon_path;
                break;  
        }

        return $path;
    }

    /*
     * Upload logo image
     */
    public function uploadLogo($setting, $logo, $type)
    {
        $path = $this->getImgPath($type);

        $image_name = time().$logo->getClientOriginalName();
        
        $this->storage->put($path.$image_name, file_get_contents($logo->getRealPath()));

        return $image_name;
    }

    /*
     * remove logo or favicon icon
     */
    public function removeLogo(Setting $setting, $type)
    {
        $path = $this->getImgPath($type);

        if ($setting->$type && $this->storage->exists($path.$setting->$type)) {
            $this->storage->delete($path.$setting->$type);
        }

        $result = $setting->update([$type => null]);

        if ($result) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.settings.update_error'));
    }
}
