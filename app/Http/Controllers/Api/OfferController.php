<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;
use App\Models\Api\User; 
use App\Models\Service\Service;
use App\Models\ServiceCategory\Servicecategory;
use App\Models\Service\Customerservice;
use App\Models\Service\Thirdpartyresponse;
use App\Models\Service\Wallet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; 
use Validator;

use stdClass;

class OfferController extends Controller 
{
    public $successStatus = 200;
    public $paginate_no = 10;

    public function getOffers(Request $request){
        /*$service_categories = auth()->user()->service_categories;
        dd($service_categories);*/
        $name = $request->name;
        $offer_type = $request->offer_type;
        $query = Service::query();
        /*$query->when($name!='',function ($q) {
            return $q->where('name','LIKE','%'.$request->name.'%');
        });*/
        if ($name!='') {
            $query->where('name','LIKE','%'.$name.'%');
        }
        if ($offer_type!='') {
            $query->where('offer_type','LIKE','%'.$offer_type.'%');
        }
        $offers = $query->where('status', '=', 1)->paginate($this->paginate_no);
        //dd($offers);

        if(count($offers)>0) {
            $response['status'] = true;
            $response['message'] = 'Record has found';
            $response['code'] = 200;
            $response['data'] = $offers->toArray();
        } else {
            $response['status'] = false;
            $response['message'] = 'No Record found';
            $response['code'] = 200;
            $response['data'] = new stdClass;
        }
        return response()->json($response, $this-> successStatus); 
    }

     public function getOfferDetails(Request $request){
        $service_id = $request->offer_id;
        $category_id = 5;
        //dd($service_id);
        //$offers = DB::table('services')->where('id', $service_id)->get();
        //$offers = Service::find($service_id);
        $offers = Service::with('categories')->where('id', $service_id)->first();
        //dd($offers);
        /*$offers = Service::whereHas('categories', function ($q) use ($category_id) {
            $q->where('service_categories.id', $category_id);
        })->find($service_id);*/

        if($offers->count()>0) {
            $response['status'] = true;
            $response['message'] = 'Record has found';
            $response['code'] = 200;
            $response['data'] = $offers->toArray();
        } else {
            $response['status'] = false;
            $response['message'] = 'No Record found';
            $response['code'] = 200;
            $response['data'] = new stdClass;
        }
        return response()->json($response, $this-> successStatus); 
    }
 
    public function getOfferCategories(Request $request){
        /*$service_categories = auth()->user()->service_categories;
        dd($service_categories);*/
        $name = $request->name;
        $query = Servicecategory::query();
        /*$query->when($name!='',function ($q) {
            return $q->where('name','LIKE','%'.$request->name.'%');
        });*/
        if ($name!='') {
            $query->where('name','LIKE','%'.$name.'%');
        }
        $categories = $query->paginate($this->paginate_no);

        if(count($categories)>0) {
            $response['status'] = true;
            $response['message'] = 'Record has found';
            $response['code'] = 200;
            $response['data'] = $categories->toArray();
        } else {
            $response['status'] = false;
            $response['message'] = 'No Record found';
            $response['code'] = 200;
            $response['data'] = new stdClass;
        }
        return response()->json($response, $this-> successStatus); 
    }
    public function getFeaturedOffers(Request $request){
        $name = $request->name;
        $offer_type = $request->offer_type;
        $query = Service::query();
        $query->where(['is_featured'=>2, 'status'=>1]);
        if ($name!='') {
            $query->where('name','LIKE','%'.$name.'%');
        }
        if ($offer_type!='') {
            $query->where('offer_type','LIKE','%'.$offer_type.'%');
        }
        $offers = $query->paginate(10);

        if(count($offers)>0) {
            $response['status'] = true;
            $response['message'] = 'Record has found';
            $response['code'] = 200;
            $response['data'] = $offers->toArray();
        } else {
            $response['status'] = false;
            $response['message'] = 'No Record found';
            $response['code'] = 200;
            $response['data'] = new stdClass;
        }
        return response()->json($response, $this-> successStatus); 
    }
    public function getFeaturedCategories(Service $service, Request $request){
        $featuredCatgry = [];
        $offer_type = $request->offer_type;
        $query = Service::with('categories')->where('services.is_featured','=',2);

        if ($offer_type!='') {
            $query->where('offer_type','=',$offer_type);
        }
        $services = $query->paginate(10);
        foreach ($services as $key => $value) {
            //dd($value->categories);
            foreach ($value->categories as $key => $value) {
                $featuredCatgry[] = $value;
            }
        }
        //dd($featuredCatgry);
        $tempArr = array_unique(array_column($featuredCatgry, 'id'));
        $newfeatured = array_intersect_key($featuredCatgry, $tempArr);
        if(count($newfeatured)>0) {
            $response['status'] = true;
            $response['message'] = 'Record has found';
            $response['code'] = 200;
            $response['data'] = $newfeatured;
        } else {
            $response['status'] = false;
            $response['message'] = 'No Record found';
            $response['code'] = 200;
            $response['data'] = [];
        }
        return response()->json($response, $this-> successStatus); 
    }

    public function SearchOffers(Service $service,User $user, Request $request){
        $validator = Validator::make($request->all(), [ 
            'search' => 'required|string',
        ]);
        if ($validator->fails()) {
            $response['status'] = false;
            $response['message'] = $validator->errors();
            $response['code'] = 200;
            $response['data'] = new stdClass;
            return response()->json($response);            
        }

        $search = $request->search;

        if($search!='')
        {   
            /*$offers = DB::table('services')
                ->leftJoin('service_map_categories as smc', 'smc.service_id', '=', 'services.id')
                ->leftJoin('service_categories as sc', 'sc.id', '=', 'smc.category_id')
                ->leftJoin('users', 'users.id', '=', 'services.vendor_id')
                ->select('services.name as service_name','sc.name as service_category_name','users.accountname','services.title','services.image','services.image_path','services.description','services.url','services.start_date','services.end_date','services.disc_perc','services.coupon_code','services.url','services.is_featured','services.status','services.created_at','services.updated_at')
                ->where('services.name','LIKE','%'.$srchName.'%')
                ->orWhere('sc.name','LIKE','%'.$srchName.'%')
                ->orWhere('users.accountname', 'LIKE','%'.$srchName.'%')
                ->get();*/
            //$offers = Service::with('categories')->where('services.name','=',$search)->get();
            /*$offers = Service::whereHas('categories' , function ($q) use($search) {
                $q->where('name','LIKE','%'.$search.'%');
            })->orWhereHas ('user' , function ($q) use($search) {
                $q->where('name','LIKE','%'.$search.'%');
            })->orWhere('name', 'LIKE','%'.$search.'%')->with('categories')->with('user')->get();*/
            /*dump($offers->toSql());
            dd($offers->get());*/

            $offers = Service::where('name','LIKE','%'.$search.'%')->get();
            $categories = Servicecategory::where('name','LIKE','%'.$search.'%')->get();
            $vendors = User::whereHas('services', function($q) use($search){
                $q->where('accountname','LIKE','%'.$search.'%');
            })->get();

            if($offers->count()>0 || $categories->count()>0 || $vendors->count()>0) {
                $response['status'] = true;
                $response['message'] = 'Record has found';
                $response['code'] = 200;
                $response['data']['offers'] = $offers;
                $response['data']['categories'] = $categories;
                $response['data']['vendors'] = $vendors;
            } else {
                $response['status'] = false;
                $response['message'] = 'No Record found';
                $response['code'] = 200;
                $response['data'] = new stdClass;
            }
        }
        return response()->json($response, $this-> successStatus); 
    }

    public function SearchSuggestionOffers(Service $service,User $user, Request $request) {
        $validator = Validator::make($request->all(), [ 
            'search' => 'required|string',
        ]);
        if ($validator->fails()) {
            $response['status'] = false;
            $response['message'] = $validator->errors();
            $response['code'] = 200;
            $response['data'] = [];
            return response()->json($response);            
        }

        $srchName = $request->search;

        if($srchName!='')
        {   
            $offers = DB::table('services')
                ->leftJoin('service_map_categories as smc', 'smc.service_id', '=', 'services.id')
                ->leftJoin('service_categories as sc', 'sc.id', '=', 'smc.category_id')
                ->leftJoin('users', 'users.id', '=', 'services.vendor_id')
                ->select('services.name as service_name')
                ->where('services.name','LIKE','%'.$srchName.'%')
                ->orWhere('sc.name','LIKE','%'.$srchName.'%')
                ->orWhere('users.accountname', 'LIKE','%'.$srchName.'%')
                ->get();
            if($offers->count()>0) {
                $response['status'] = true;
                $response['message'] = 'Record has found';
                $response['code'] = 200;
                $response['data'] = $offers;
            } else {
                $response['status'] = false;
                $response['message'] = 'No Record found';
                $response['code'] = 200;
                $response['data'] = [];
            }
        }
        return response()->json($response, $this-> successStatus); 
    }

    public function getVendorOffers(Request $request){
        $validator = Validator::make($request->all(), [ 
            'vendor_id' => 'required|string',
        ]);
        if ($validator->fails()) {
            $response['status'] = false;
            $response['message'] = $validator->errors();
            $response['code'] = 200;
            $response['data'] = new stdClass;
            return response()->json($response);            
        }

        $vendor_id = $request->vendor_id;
        $offer_type = $request->offer_type;
        $search = $request->search;

        $query = Service::query();
        if ($vendor_id!='') {
            $query->where('vendor_id','=',$vendor_id);
        }
        if ($offer_type!='') {
            $query->where('offer_type','=',$offer_type);
        }
        if ($search!='') {
            $query->where('name','LIKE','%'.$search.'%');
        }
        $offers = $query->paginate(10);

        if(count($offers)>0) {
            $response['status'] = true;
            $response['message'] = 'Record has found';
            $response['code'] = 200;
            $response['data'] = $offers->toArray();
        } else {
            $response['status'] = false;
            $response['message'] = 'No Record found';
            $response['code'] = 200;
            $response['data'] = new stdClass;
        }
        return response()->json($response, $this-> successStatus); 
    }

    public function getCategoryOffers(Request $request){
        $validator = Validator::make($request->all(), [ 
            'category_id' => 'required|string',
        ]);
        if ($validator->fails()) {
            $response['status'] = false;
            $response['message'] = $validator->errors();
            $response['code'] = 200;
            $response['data'] = new stdClass;
            return response()->json($response);            
        }

        $category_id = $request->category_id;
        $offer_type = $request->offer_type;
        $search = $request->search;

        $query = Service::whereHas('categories', function($q) use($category_id) {
            $q->where('service_categories.id','=',$category_id);
        });
        /*dd($query);*/

        if ($category_id!='') {
            
        }
        if ($offer_type!='') {
            $query->where('offer_type','=',$offer_type);
        }
        if ($search!='') {
            $query->where('services.name','LIKE','%'.$search.'%');
        }
        $offers = $query->paginate(10);
        

        if(count($offers)>0) {
            $response['status'] = true;
            $response['message'] = 'Record has found';
            $response['code'] = 200;
            $response['data'] = $offers->toArray();
        } else {
            $response['status'] = false;
            $response['message'] = 'No Record found';
            $response['code'] = 200;
            $response['data'] = new stdClass;
        }
        return response()->json($response, $this-> successStatus); 
    }

    public function applyOffer(Request $request) {
        $validator = Validator::make($request->all(), [ 
            'offer_id' => 'required',
            'category_id' => 'required'
        ]);

        if ($validator->fails()) {
            $response['status'] = false;
            $response['message'] = $validator->errors();
            $response['code'] = 200;
            $response['data'] = new stdClass;
            return response()->json($response);            
        }
        $user_id = Auth::User()->id;

        $category_name = ServiceCategory::where(['id' =>$request->category_id])->first()->name;

        //check offer already applied
        /*$checkRecord = Customerservice::where(['service_id' =>$request->offer_id , 
                        'user_id' => $user_id])
                        ->first();
        if($checkRecord !== null) {
            $response['status'] = true;
            $response['message'] = 'Offer already applied.';
            $response['code'] = 200;
            $response['data'] = new stdClass;
            return response()->json($response, $this->successStatus);
        }*/

        $url = Service::find($request->offer_id)->url;
        $parsed_url = parse_url($url);
        $token = str_random(16);
        if(parse_url($url, PHP_URL_QUERY)) {
            $url .= '&offer_code='.$token.'&category_name='.$category_name;
        } else {
            $url .= '&offer_code='.$token.'&category_name='.$category_name;
        }

        $service_apply = new Customerservice();
        $service_apply->user_id = $user_id;
        $service_apply->token = $token;
        $service_apply->url = $url;
        $service_apply->service_id = $request->offer_id;
        $service_apply->category_id = $request->category_id;
        $service_apply->status = 'success';
        $service_apply->save();

        if($service_apply->save()) {

            $purchase = mt_rand(100,1000);
            //get offer details
            $offer = Service::find($request->offer_id);
            $percentage = $offer->disc_perc;
            $offer_amount = ($percentage / 100) * $purchase;
            $offer_amount = number_format((float)$offer_amount, 2, '.', '');

            //Save in wallet
            $wallet = new Wallet;
            $wallet->customer_service_id    = $service_apply->id;
            $wallet->purchase_amount        = $purchase;
            $wallet->offer_percentage       = $percentage;
            $wallet->offer_amount           = $offer_amount;
            $wallet->save();

            //Save in third_party_responses
            $third_party = new Thirdpartyresponse;
            $third_party->token             = $token;
            $third_party->category          = $category_name;
            $third_party->purchase_amount   = $purchase;
            $third_party->offer_percentage  = $percentage;
            $third_party->offer_amount      = $offer_amount;
            $third_party->save();

            $response['status'] = true;
            $response['message'] = 'Success.';
            $response['code'] = 200;
            $response['data'] = new stdClass;
        } else {
            $response['status'] = false;
            $response['message'] = 'Error';
            $response['code'] = 200;
            $response['data'] = new stdClass;
        }
        return response()->json($response, $this-> successStatus);

        //echo ($request->category_id.'||'.$request->offer_id.'||'.$user_id.'||'.$token);die;

    }

    function applyOfferStatus(Request $request) {
        $validator = Validator::make($request->all(), [ 
            'token'         => 'required',
            'category'      => 'required',
            'purchase'      => 'required'
        ]);
        if ($validator->fails()) {
            $response['status'] = false;
            $response['message'] = $validator->errors();
            $response['code'] = 200;
            $response['data'] = new stdClass;
            return response()->json($response);            
        }

        
        $customerService = Customerservice::where('token', '=', $request->token)->first();

        //verify token
        if($customerService === null) {
            $response['status'] = true;
            $response['message'] = 'Invalid token.';
            $response['code'] = 200;
            $response['data'] = new stdClass;
            return response()->json($response, $this->successStatus);
        }

        ////verify category name
        $categoryName = ServiceCategory::where(['id' =>$customerService->category_id])->first()->name;
        if($categoryName != $request->category) {
            $response['status'] = true;
            $response['message'] = 'Category Mismatch.';
            $response['code'] = 200;
            $response['data'] = new stdClass;
            return response()->json($response, $this->successStatus);
        }

        //check offer already applied
        $checkRecord = Customerservice::where(['token' => $request->token, 'status' => 'success'])
                        ->first();
        if($checkRecord !== null) {
            $response['status'] = true;
            $response['message'] = 'Offer already applied.';
            $response['code'] = 200;
            $response['data'] = new stdClass;
            return response()->json($response, $this->successStatus);
        }

        //get offer details
        $offer = Service::find($customerService->service_id);
        $percentage = $offer->disc_perc;
        $offer_amount = ($percentage / 100) * $request->purchase;
        $offer_amount = number_format((float)$offer_amount, 2, '.', '');

        //update customer service status to success
        $status = Customerservice::where('token',$request->token)
                      ->update(['status' => 'success']);
        $cust_serv_id = Customerservice::where(['token' => $request->token])
                        ->first()->id;
        //dd($cust_serv_id);

        if($status) {
            //Save in wallet
            $wallet = new Wallet;
            $wallet->customer_service_id    = $cust_serv_id;
            $wallet->purchase_amount        = $request->purchase;
            $wallet->offer_percentage       = $percentage;
            $wallet->offer_amount           = $offer_amount;
            $wallet->save();

            //Save in third_party_responses
            $third_party = new Thirdpartyresponse;
            $third_party->token             = $request->token;
            $third_party->category          = $request->category;
            $third_party->purchase_amount   = $request->purchase;
            $third_party->offer_percentage  = $percentage;
            $third_party->offer_amount      = $offer_amount;
            $third_party->save();

            $response['status'] = true;
            $response['message'] = 'Success.';
            $response['code'] = 200;
            $response['data'] = new stdClass;

        } else {
            $response['status'] = false;
            $response['message'] = 'Invalid token.';
            $response['code'] = 200;
            $response['data'] = new stdClass;
        }
        return response()->json($response, $this->successStatus);
         
    }
    
}