<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings\Setting;
use App\Models\Enquiry\Enquiry;
use App\Repositories\Frontend\Access\User\UserRepository;
use Mail;
use stdClass;


class ContactusController extends Controller
{

	public $successStatus = 200;

    public function submit(Request $request)
    {
        $settingData = Setting::first();
        $admin_email = $settingData->company_email;
        
        $message = trim($request->message);
        if (empty($message)) {
            throw new GeneralException('Please enter your message.');
        }

        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'phone' => ($request->phone) ? $request->phone : 0,
            'body' => $request->message,
        );

        $added = Enquiry::create($data);

        Mail::send('emails.contact_email', $data, function ($message) use ($request, $admin_email)
        {
            /* Config ********** */
            $to_email = $admin_email;
            $to_name  = "Administrator";
            $subject  = env('APP_NAME') . " | Contact Message";
            $message->subject($subject);
            $message->from($request->email, $request->name);
            $message->to($to_email, $to_name);
        });

        $suggestedValues = [
            'user_name' => $request->name,
            'user_email'=> $request->email,
        ];
        $emailmessage = UserRepository::getReplacedEmailPlaceHolders(3, $suggestedValues);
        $message = ($emailmessage) ? $emailmessage : '';
        $data = array(
            'body' => $message,
        );

        Mail::send('emails.custom_email', $data, function ($message) use ($request, $admin_email)
        {
            /* Config ********** */
            $to_email = $request->email;
            $to_name  = $request->name;
            $subject  = env('APP_NAME') . " | Thanks for contact us.";
            $message->subject($subject);
            $message->from($admin_email, env('APP_NAME'));
            $message->to($to_email, $to_name);
        });
        
        if ($added) {
            $status = 'error';
        } else {
            $status = 'success';
        }
        if (count(Mail::failures()) > 0) {
            $response['status'] = false;
            $response['message'] = 'Error.';
            $response['code'] = 200;
            $response['data'] = new stdClass;
        } else {
            $response['status'] = true;
            $response['message'] = 'Thanks for contact us.';
            $response['code'] = 200;
            $response['data'] =  new stdClass;
        }

        return response()->json($response, $this-> successStatus);
    }
}
