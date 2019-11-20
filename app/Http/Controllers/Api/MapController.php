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
use App\Models\Redeem\Redeem;
use App\Models\Api\Referral;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

use stdClass;

class MapController extends Controller
{
    public $successStatus = 200;
    public $paginate_no = 10;

    public function list()
    {
        $map = DB::table('users')
        ->join('role_user', 'users.id', '=', 'role_user.user_id')
        ->select('users.id', 'users.first_name',"users.last_name", 'users.email', 'users.phone', 'users.address', 'users.latitude', 'users.longitude')
        ->where('role_user.role_id', '=', 2)->get();
        
        if( $map->count()>0) {
            $response['status'] = true;
            $response['message'] = 'Success.';
            $response['code'] = 200;
            $response['data'] =  $map->toArray();
        }else {
            $response['status'] = false;
            $response['message'] = 'No Record found';
            $response['code'] = 200;
            $response['data'] = [];
        }
        return response()->json($response, $this-> successStatus);
    }

}