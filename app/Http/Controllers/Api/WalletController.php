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

class WalletController extends Controller
{
    public $successStatus = 200;
    public $paginate_no = 10;

    public function details() {
        $user_id = Auth::User()->id;

        $wallet = Wallet::whereHas('customerServices', function($q) use($user_id) {
        })->get();

        if($wallet->count()>0) {
            $response['status'] = true;
            $response['message'] = 'Success.';
            $response['code'] = 200;
            $response['data'] = $wallet->toArray();
        } else {
            $response['status'] = false;
            $response['message'] = 'No Record found';
            $response['code'] = 200;
            $response['data'] = new stdClass;
        }
        return response()->json($response, $this-> successStatus);
    }

    public function AvailableBalance()
    {
        $user_id = Auth::User()->id;

        //$wallet = Wallet::whereHas('customerServices', function($q) use($user_id) {        })->sum('purchase_amount');

        /*$wallet = Customerservice::with(['wallet'=> function($q){ 
                    $q->sum('offer_amount');
                }])->where('user_id','=',$user_id)->toSql();
        dd($wallet);*/

        //$customerService = Customerservice::find(3)->wallet;
        $wallet = DB::table('wallets as w')
                    ->join('customer_services as cs', 'w.customer_service_id', '=', 'cs.id')
                    ->where('cs.user_id', '=', $user_id)
                    ->sum('w.offer_amount');

        $referral = Referral::where('user_id',$user_id)->sum('amt');

        $redeem = Redeem::where(['user_id'=>$user_id, 'status'=>1])->sum('amount');
        $total = $wallet + $referral - $redeem;

       if($wallet) {
            $response['status'] = true;
            $response['message'] = 'Success.';
            $response['code'] = 200;
            $response['data'] = $total;
        }else {
            $response['status'] = false;
            $response['message'] = 'No Record found';
            $response['code'] = 200;
            $response['data'] = "0.00";
        }
        return response()->json($response, $this-> successStatus);
    }

    public function History(Request $request)
    {

        // $user_id = Auth::User()->id;
        // dd($user_id);
        /*$wallet = Customerservice::with(['wallet'])->whereHas('customerServices', function($query) use($user_id) {
            return $query->Where('user_id', $user_id);
        });*/
        $wallet = DB::table('wallets as w')
                    ->join('customer_services as cs', 'w.customer_service_id', '=', 'cs.id')
                    ->join('services as s', 'cs.service_id', '=', 's.id')
                    ->select('w.id as wallets_id', 'w.*',"cs.*", 's.*')
                    ->where('cs.user_id', '=', $request->user_id);

        //$wallet = $wallet->select('customer_services.user_id');
        $wallet = $wallet->paginate(10);
         //dd($wallet);

        if($wallet->count()>0) {


            /*$result = [];
            foreach($wallet as $k=>$wl){
                $result[$k]['title'] = $wl->customerServices->service->title;
                $result[$k]['image'] = $wl->customerServices->service->image_path;
                $result[$k]['created_at'] = $wl->customerServices->created_at;
                $result[$k]['id'] = $wl->id;
                $result[$k]['purchase_amount'] = $wl->purchase_amount;
                $result[$k]['offer_percentage'] = $wl->offer_percentage;
                $result[$k]['offer_amount'] = $wl->offer_amount;
                $result[$k]['status'] = $wl->status;
                $result[$k]['customer_service_id'] = $wl->customer_service_id;
                //dd($wl->customerServices->created_at);
            }*/


            $response['status'] = true;
            $response['message'] = 'Success.';
            $response['code'] = 200;
            //$response['data'] = $result;
             $response['data'] = $wallet->toArray();
        }else {
            $response['status'] = false;
            $response['message'] = 'No Record found';
            $response['code'] = 200;
            $response['data'] = [];
        }
        return response()->json($response, $this->successStatus);
    }

    public function update($id, Request $request)
    {

        $code =  $request->code;

        $vendor = DB::table('wallets as w')
        ->join('customer_services as cs', 'w.customer_service_id', '=', 'cs.id')
        ->join('services as s', 'cs.service_id', '=', 's.id')
        ->join('users as u', 's.vendor_id', '=', 'u.id')
        ->select('u.pin_code as pin_code')
        ->where('w.id', '=', $id)
        ->first();

        if(!isset($code) || $code != $vendor->pin_code){
            $response['status'] = false;
            $response['message'] = 'Invalid pin code!';
            $response['code'] = 200;
        }else{
            $walletk = DB::table('wallets')
            ->where('wallets.id', $id)
            ->update(['wallets.used' => 1]);
    
            if($walletk !== false) {
                $response['status'] = true;
                $response['message'] = 'Success.';
                $response['code'] = 200;
            }else {
                $response['status'] = false;
                $response['message'] = 'No Record found';
                $response['code'] = 200;
            }
        }
        
        return response()->json($response, $this->successStatus);
    }

}