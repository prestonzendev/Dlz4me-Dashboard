<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner\Banner;
use App\Repositories\Frontend\Pages\PagesRepository;
use Illuminate\Http\Request;
use App\Models\Preference\Preference;
use App\Models\Preferencesoption\Preferencesoption;
use App\Models\Subscriptionplan\Subscriptionplan;
use App\Models\Page\Page;
use Redirect;
use DB;
use Session;
/**
 * Class FrontendController.
 */
class FrontendController extends Controller 
{
    /**
     * @return \Illuminate\View\View
     */
    public function index(PagesRepository $pages)
    {
        //dd(app()->getLocale());
        $banners = DB::table('banners')->where('status', 1)->select('title','bannerfile','description')->get()->toArray();
        $homecontent = Page::where('status', 1)->wherein('page_slug', ['how-it-works-home', 'about-us-home', 'ipsum-has', 'contrary-to-popular', 'been-the-industry', 'what-reviews-say-about-us','home-text'])->select('page_slug', 'title', 'description')->get()->keyBy('page_slug')->toArray();
        $reviews = DB::table('reviews')->where('status', 1)->take(5)->get();
        return view('frontend.index')->with([
            'banners' => $banners,
            'homecontent' => $homecontent,
            'reviews' => $reviews,
        ]);
    }

    /**
     * show page by thankyou.
     */
    public function thankyou()
    {
        return view('frontend.pages.thankyou')
            ->with([
                'title' => 'Thank You'
            ]);
    }

    /**
     * show page by $page_slug.
     */
    public function showPage($slug, PagesRepository $pages)
    {
        $result = $pages->findBySlug($slug);
        $title = $result['title'];
        return view('frontend.pages.index')
            ->withpage($result)
            ->with([
                'title' => $title,
            ]);
    }

    /**
     * show faq page.
     */
    public function faqs()
    {
        $faqs = DB::table('faqs')->where('status', 1)->whereNull('deleted_at')->get()->toArray();
        return view('frontend.faqs')->with([
            'faqs' => $faqs,
            'title' => 'FAQ',
        ]);
    }

    /**
     * show terms page.
     */
    public function terms()
    {
        return view('frontend.termsandconditions')->with([
            'title' => 'Terms and Conditions',
        ]);
    }

    /**
     * show privacy page.
     */
    public function privacy()
    {
        return view('frontend.privacy')->with([
            'title' => 'Privacy Policy',
        ]);
    }


    /**
     * @return \Illuminate\View\View
     */
    public function reviews()
    {
        $reviews = DB::table('reviews')->where('status', 1)->paginate(50);
        return view('frontend.reviews')->with([
            'title' => 'Reviews',
            'reviews' => $reviews,
        ]);
    }


    /**
     * @return \Illuminate\View\View
     */
    public function showreview($id)
    {
        $review = DB::table('reviews')->where('status', 1)->where('id', $id)->first();
        return view('frontend.showreview')->with([
            'title' => 'Reviews',
            'review' => $review,
        ]);
    }

    /**
     * Change current page translation language
     * 
     * @param integer $language
     * @param Request $request
     * 
     * @return Redirect
     */
    public function change_langage($language = 'en', Request $request) {
        //$url = $request->query('url');
        $url = $request->url();

        $request->session()->put('languageAbbr', $language);

        return Redirect::intended();
    }

}
