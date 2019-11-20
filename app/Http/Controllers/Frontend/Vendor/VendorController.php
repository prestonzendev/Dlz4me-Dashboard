<?php

namespace App\Http\Controllers\Frontend\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Access\User\User;
use App\Http\Requests\Frontend\User\DashboardViewRequest;
use App\Models\Banner\Banner;
use App\Repositories\Frontend\Pages\PagesRepository;
use App\Repositories\Frontend\Access\User\UserRepository;
use Illuminate\Http\Request;
use App\Models\Preference\Preference;
use App\Models\Preferencesoption\Preferencesoption;
use App\Models\Subscriptionplan\Subscriptionplan;
use App\Models\Page\Page;
use DB;

/**
 * Class VendorController.
 */
class VendorController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * ProfileController constructor.
     *
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }
    
    public function index(PagesRepository $pages){
        return view('frontend.vendor.dashboard');
    }

    public function profile(DashboardViewRequest $request )
    {
        $user = User::find(access()->id());
        $countries = DB::table('apps_countries')->select('country_name')->orderBy('country_name','Asc')->get()->keyBy('country_name')->toArray();
        $country = [
            '' => 'Select Country',
        ];
        if ($countries) {
            foreach($countries as $name => $coun) {
                $country[$name] = $name;
            }
        }
        
        $profile =  [
                'userinfo' => $user,
                'countries' => $country
            ];

        //$profile = UserRepository::getVendorProfileDetails(access()->id());
       
        $profile['title'] = 'Create Your Profile';
        return view('frontend.vendor.profile')->with(
            $profile
        );

    }
    public function editprofile(Request $request)
    {
        $user = User::find(access()->id());
        $input = $request->all();
        $zip = trim($input['zip']);
        if (empty($zip)) {
            throw new GeneralException('Postcode is required.');
        }
        if (empty($input['country'])) {
            throw new GeneralException('Select your country is required.');
        }
        
        /*if ($this->findByAccountName($id, $input['accountname'])) {
            throw new GeneralException('Account name already taken.');
        }*/
        
        //$user = User::createUserStub($user, $input);
        $userlooksfor = DB::table('users')->where('id', $user->id)->first();

        
        $user->first_name = $input['first_name'];
        $user->last_name = $input['last_name'];
        $user->phone = $input['phone'];
        $user->address = $input['address'];
        $user->address_2 = $input['address_2'];
        $user->city = $input['city'];
        $user->state = $input['state'];
        $user->country = $input['country'];
        $user->zip = $input['zip'];
        $user->latitude = $input['latitude'];
        $user->longitude = $input['longitude'];
        
        $user->updated_by = access()->user()->id;
        $save = $user->save();

        var_dump($save); 

        //$output = $this->user->editVendorProfile(access()->id(), $request->all());
        return redirect()->route('frontend.vendor.dashboard')->withFlashSuccess(trans('strings.frontend.user.profile_updated'));
    }

   

}
