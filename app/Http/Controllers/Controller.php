<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected static $currentLangAbbr = "en";

    /**
     * Constructor for Base controller
     * 
     * @return Request
     */
    public function __construct()
    {
        $this->middleware(function($request, $next) {
            $languageSetInSession = session()->get('languageAbbr');        
            $currentLanguage = ((isset($languageSetInSession) && $languageSetInSession != "") ? $languageSetInSession : "en");
            app()->setLocale($currentLanguage);
            
            View()->share('currentLangAbbr', $currentLanguage);
            self::$currentLangAbbr = $currentLanguage;
            return $next($request);
        });
    }
}

