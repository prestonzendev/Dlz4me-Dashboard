<?php

namespace App\Http\Controllers\Frontend\Vendor;

use DB;
use App\Http\Controllers\Controller;
use App\Models\Service\Service;
use Illuminate\Http\Request;
use App\Models\ServiceCategory\Servicecategory;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Redirect;
use Auth;
use Storage;
use URL;

class OfferController extends Controller
{
	public function __construct()
    {
        $this->image_path = 'img'.DIRECTORY_SEPARATOR.'offer'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }
    public function index(){
        $data = [];
        $vendor_id = Auth::user()->id;
        $offers = DB::table('services')->where('vendor_id', $vendor_id)->get();
        $data['offers'] = $offers;
        return view('frontend.vendor.offer.index',$data);
    }
    public function show() {
        $serviceCategories = Servicecategory::getSelectData();
        $Servicecategory = [
            '' => 'Select Category',
        ];
        if ($serviceCategories) {
            foreach($serviceCategories as $name => $coun) {
                $Servicecategory[$name] = $coun;
            }
        }
        $data['Servicecategory'] = $Servicecategory;

        return view('frontend.vendor.offer.create',$data);
    }

    public function create() {
    	$file = $this->uploadimage(Input::file('image'));
    	$service = new Service;

    	$service->vendor_id = Auth::user()->id; 
    	$service->name = Input::get('name');
    	$service->title = Input::get('title');
    	$service->image = $file['image'];
        $service->image_path = $service->image ? URL::to("/").'/storage/app/public/img/offer/'.$file['image'] : '';
    	$service->description = Input::get('description');
    	$service->url = Input::get('url');
    	$service->disc_perc = Input::get('disc_perc');
    	$service->coupon_code = Input::get('coupon_code');
    	$service->offer_type = Input::get('offer_type');
        $service->is_featured = Input::get('is_featured');
        $service->start_date = Input::get('start_date');
        $service->end_date = Input::get('end_date');
        $categoryId = Input::get('category');
        $service->status = 1;

    	$service->save();
        $service->categories()->sync($categoryId);
    	session()->flash('message', 'Offer created!');
    	return redirect()->route('frontend.vendor.services.index');
   }
    public function edit(Service $service)
    {
        $serviceCategories = Servicecategory::getSelectData();
        $Servicecategory = [
            '' => 'Select Category',
        ];
        if ($serviceCategories) {
            foreach($serviceCategories as $name => $coun) {
                $Servicecategory[$name] = $coun;
            }
        }
        $category_id = $service->categories->pluck('id');
        return view('frontend.vendor.offer.edit',compact('service','Servicecategory','category_id'));
    }
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
        ]);
        if ($request->image) {
            $file = $this->uploadimage($request->image);
            $service->image = $file['image'];
            $service->image_path = $service->image ? URL::to("/").'/storage/app/public/img/offer/'.$file['image'] : '';
        }

        $service->name = $request->name;
        $service->title = $request->title;
        $service->description = $request->description;
        $service->url = $request->url;
        $service->disc_perc = $request->disc_perc;
        $service->coupon_code = $request->coupon_code;
        $service->start_date = $request->start_date;
        $service->end_date = $request->end_date;
        $service->offer_type = $request->offer_type;
        $service->is_featured = $request->is_featured;
        $service->status = 1;
        $service->update();
        return redirect()->route('frontend.vendor.services.index')
                        ->with('success','Offer updated successfully');
    }

   public function uploadimage($file)
    {
        $avatar = $file;
        if (isset($file) && !empty($file)) {
            $fileName = time().$avatar->getClientOriginalName();

            $this->storage->put($this->image_path.$fileName, file_get_contents($avatar->getRealPath()));

            return ['image' => $fileName];
        }
    }
}
