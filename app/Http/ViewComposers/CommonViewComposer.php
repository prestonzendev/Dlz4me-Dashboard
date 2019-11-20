<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Models\Settings\Setting;
use App\Models\Page\Page;
use Route;
use DB;

class CommonViewComposer {

    public function compose(View $view) {

    	$unseenChats = 0; 
    	$userid = \Auth::guard('user')->id();
    	if ($userid) {
    		$unseenChats = DB::table('chats')->where('receiver_id', $userid)->where('seen', 0)->count();
    	}

        $setting = Setting::first();

        $this->set_env('MAIL_FROM_NAME', $setting->from_name);
        $this->set_env('MAIL_HOST', $setting->smtp_address);
        $this->set_env('MAIL_PORT', $setting->smtp_port);
        $this->set_env('MAIL_FROM', $setting->from_email);
        $this->set_env('MAIL_USERNAME', $setting->smtp_username);
        $this->set_env('MAIL_PASSWORD', $setting->smtp_password);

        $activeslugs = Page::where('status', 1)->get(['page_slug'])->keyBy('page_slug')->toArray();
        $reqPath = \Request::path();

        if ($setting->live_pay_mode) {
            $this->set_env('STRIPE_KEY', $setting->stripe_key);
            $this->set_env('STRIPE_SECRET', $setting->stripe_secret);
        } else {
            $this->set_env('STRIPE_KEY', $setting->stripe_key_test);
            $this->set_env('STRIPE_SECRET', $setting->stripe_secret_test);
        }

        $view->with(compact('setting', 'activeslugs', 'unseenChats','reqPath'));
    	
    }


    /**
     * @param string $key
     * @param string $value
     * @param null $env_path
     */
    function set_env(string $key, $value, $env_path = null)
    {
        $value = preg_replace('/\s+/', '', $value); //replace special ch
        $key = strtoupper($key); //force upper for security
        $epath = isset($env_path) ? $env_path : base_path('.env');
        $env = file_get_contents($epath); //fet .env file

        $oldStr = "$key=" . env($key);
        $newStr = "$key=" . $value;
        $foundNew = stripos($env, $newStr);
        $foundOld = stripos($env, $oldStr);

        if ($foundNew === false && $foundOld !== false) {
            $env = str_replace($oldStr, $newStr, $env); //replace value
            /** Save file eith new content */
            $env = file_put_contents(isset($env_path) ? $env_path : base_path('.env'), $env);
        }
    }
}

