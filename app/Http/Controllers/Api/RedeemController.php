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
use App\Models\Service\BankAccount;
use App\Models\Service\Redeem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; 
use Validator;

use stdClass;

class RedeemController extends Controller 
{
    public $successStatus = 200;
    public $paginate_no = 10;

    public function list() {
        $user_id = Auth::User()->id;

    
        $Redeem = Redeem::where('user_id', '=', $user_id)->get();

        if($Redeem->count()>0) {
            $response['status'] = true;
            $response['message'] = 'Success.';
            $response['code'] = 200;
            $response['data'] = $Redeem->toArray();
        } else {
            $response['status'] = false;
            $response['message'] = 'No Record found.';
            $response['code'] = 200;
            $response['data'] = new stdClass;
        }
        return response()->json($response, $this-> successStatus);
    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'amount'    => 'required'
        ]);
        if ($validator->fails()) {
            $response['status'] = false;
            $response['message'] = $validator->errors();
            $response['code'] = 200;
            $response['data'] = new stdClass;
            return response()->json($response);            
        }
        $input = $request->all();

        $bankAccount = BankAccount::where('user_id','=',Auth::User()->id)->get();

        if($bankAccount->count()==0) {
            $response['status'] = false;
            $response['message'] = 'Please enter bank details.';
            $response['code'] = 200;
            $response['data'] = new stdClass;
            return response()->json($response);
        }

        $data = [];
        $data['bank_account_id']  = $input['bank_id'];
        $data['amount']           = $input['amount'];
        $data['msg']              = $input['message'];
        $data['user_id']          = Auth::User()->id;

        $bankAccount = Redeem::create($data);

        if($bankAccount) {
            $response['status'] = true;
            $response['message'] = 'Redeem requested.';
            $response['code'] = 200;
            $response['data'] = $bankAccount->toArray();
        } else {
            $response['status'] = false;
            $response['message'] = 'Error';
            $response['code'] = 200;
            $response['data'] = new stdClass;
        }
        return response()->json($response, $this-> successStatus);
    }
    
}