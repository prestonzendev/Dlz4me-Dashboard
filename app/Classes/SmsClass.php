<?php 
namespace App\Classes;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Models\SmsVerification\SmsVerification;
use Twilio\Jwt\ClientToken;
use GuzzleHttp\Exception\GuzzleException;
//use GuzzleHttp\Client;
use Twilio\Rest\Client;
 
class SmsClass{
 
   public function sendSms($data) {
       
        $accountSid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
        $authToken = config('app.twilio')['TWILIO_AUTH_TOKEN'];
        try {
            $sid = $accountSid;
            $token = $authToken;
            $client = new Client($sid, $token);

            $client->messages->create(
                $data['phone'],
                array(
                    'from' => '+12028499366',
                    'body' => 'FAKO - CODE: '. $data['mobile_code'],
                )
            );
            return 'success';
        }catch (\Twilio\Exceptions\RestException $e) {
            //echo "Error: " . $e->getMessage();die;
            return 'error';
        }
        catch (Exception $e) {
            //echo "Error: " . $e->getMessage();die;
            return 'error';
        }
    }
    public function resendOtp($data) {
        $accountSid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
        $authToken = config('app.twilio')['TWILIO_AUTH_TOKEN'];
        try {
            $sid = $accountSid;
            $token = $authToken;
            $client = new Client($sid, $token);

            $client->messages->create(
                /*$data['phone'],*/
                '+919610505499',
                array(
                    'from' => '+18134135434',
                    'body' => 'FAKO - CODE: '. $data['mobile_code'],
                )
            );
            return 'success';
        }catch (\Twilio\Exceptions\RestException $e) {
            //echo "Error: " . $e->getMessage();die;
            return 'error';
        }
        catch (Exception $e) {
            //echo "Error: " . $e->getMessage();die;
            return 'error';
        }
    }
}