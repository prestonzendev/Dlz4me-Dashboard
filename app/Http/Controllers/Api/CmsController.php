<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Pages\PagesRepository;
use App\Models\Faqs\Faq;
use stdClass;

class CmsController extends Controller
{

	public $successStatus = 200;

    public function index($slug, PagesRepository $pages) {

    	$result = $pages->findBySlug($slug);
    	if($result) {
	    	$response['status'] = true;
	        $response['message'] = 'Success.';
	        $response['code'] = 200;
	        $response['data'] = $result->toArray();
	    } else {
	    	$response['status'] = false;
	        $response['message'] = 'Error.';
	        $response['code'] = new stdClass;
	    }
	    return response()->json($response, $this-> successStatus);
    }

    public function faqs()
    {
        $faqsData = Faq::where(['status'=>1])->whereNull('deleted_at')->get();
        $result = [];
        foreach ($faqsData as $faq) {
        	$faq['answer'] = strip_tags($faq['answer']);
        	$result[]= $faq;
        }
    	if($result) {
	    	$response['status'] = true;
	        $response['message'] = 'Success.';
	        $response['code'] = 200;
	        $response['data'] = $result;
	    } else {
	    	$response['status'] = false;
	        $response['message'] = 'Error.';
	        $response['code'] = [];
	    }
	    return response()->json($response, $this-> successStatus);
    }
}
