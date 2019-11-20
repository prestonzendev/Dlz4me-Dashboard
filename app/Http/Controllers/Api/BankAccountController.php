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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; 
use Validator;

use stdClass;

class BankAccountController extends Controller 
{
    public $successStatus = 200;
    public $paginate_no = 10;

    public function list() {
        $user_id = Auth::User()->id;

        $bankAccount = BankAccount::where('user_id', '=', $user_id)->get();

        if($bankAccount->count()>0) {
            $response['status'] = true;
            $response['message'] = 'Success.';
            $response['code'] = 200;
            $response['data'] = $bankAccount->toArray();
        } else {
            $response['status'] = false;
            $response['message'] = 'No Record found.';
            $response['code'] = 200;
            $response['data'] = [];
        }
        return response()->json($response, $this-> successStatus);
    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'        => 'required',
            'account_no'  => 'required', 
            'ifsc_code'   => 'required'
        ]);
        if ($validator->fails()) {
            $response['status'] = false;
            $response['message'] = $validator->errors();
            $response['code'] = 200;
            $response['data'] = new stdClass;
            return response()->json($response);            
        }
        $input = $request->all();

        $checkBank = BankAccount::where(['bank_name'=>$input['name'], 'account_number'=>$input['account_no']])->get();
        if($checkBank->count()>0) {
            $response['status'] = false;
            $response['message'] = 'Account already exist';
            $response['code'] = 200;
            $response['data'] = new stdClass;
            return response()->json($response); 
        }

        $data = [];
        $data['account_holder']   = $input['account_name'];
        $data['bank_name']        = $input['name'];
        $data['account_number']   = $input['account_no'];
        $data['ifsc']             = $input['ifsc_code'];
        $data['user_id']          = Auth::User()->id;

        $bankAccount = BankAccount::create($data);

        if($bankAccount) {
            $response['status'] = true;
            $response['message'] = 'Account created successfully.';
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

    public function delete(Request $request) {
        $bankAccount = BankAccount::find($request->id);


        if($bankAccount->delete()) {
            $response['status'] = true;
            $response['message'] = 'Account remove successfully.';
            $response['code'] = 200;
            $response['data'] = new stdClass;
        } else {
            $response['status'] = false;
            $response['message'] = 'Error';
            $response['code'] = 200;
            $response['data'] = new stdClass;
        }
        return response()->json($response, $this-> successStatus);
    }
    
}