<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Settings\Setting;
use App\Models\Enquiry\Enquiry;
use App\Models\Reportedissue\Reportedissue;
use App\Repositories\Frontend\Pages\PagesRepository;
use App\Repositories\Frontend\Access\User\UserRepository;
use Illuminate\Http\Request;
use Mail;
use App\Exceptions\GeneralException;

/**
 * Class FrontendController.
 */
class ContactusController extends Controller
{

    /**
     * submit contact form
     */
    public function show(Request $request)
    {
        return view('frontend.contact-us')->with([
            'title' => 'Contact Us',
        ]);
    }

    /**
     * submit contact form
     */
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
            return redirect()->back()->withInput()->withFlashError('Something went wrong!');
        } else {
            return view('frontend.contact-us')->with([
                'title' => 'Contact Us',
                'show_thanks' => 1,
            ]);
        }
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function reportissue(Request $request)
    {
        $user = access()->user();
        $inputs = $request->all();
        if(isset($inputs['_token'])) {
            $message = trim($inputs['message']);
            if (empty($message)) {
                throw new GeneralException('Please enter your message.');
            }

            $data = array(
                'name' => $user->first_name . ' ' . $user->last_name,
                'email' => $user->email,
                'phone' => ($user->phone) ? $user->phone : 0,
                'body' => $request->message,
            );

            $added = Reportedissue::create($data);


            $settingData = Setting::first();
            $admin_email = $settingData->company_email;

            Mail::send('emails.contact_email', $data, function ($message) use ($admin_email, $user)
            {
                /* Config ********** */
                $to_email = $admin_email;
                $to_name  = "Administrator";
                $subject  = env('APP_NAME') . " | Issue Reported";
                $message->subject($subject);
                $message->from($user->email, $user->first_name . ' ' . $user->last_name);
                $message->to($to_email, $to_name);
            });


            $message = 'Dear ' . $user->first_name . ' ' . $user->last_name . ', ';
            $message .= 'Thanks for an issue reported at ' . env('APP_NAME') ;
            $message .= '. Your issue has been reported and we aim to respond to your message within 2 working days. ';
            $message .= 'Regards, Team ' . env('APP_NAME');
            $data = array(
                'name' => env('APP_NAME'),
                'email' => $admin_email,
                'phone' => 0,
                'body' => $message,
            );

            Mail::send('emails.contact_email', $data, function ($message) use ($user, $admin_email)
            {
                /* Config ********** */
                $to_email = $user->email;
                $to_name  = $user->first_name . ' ' . $user->last_name;
                $subject  = env('APP_NAME') . " | Thanks for report an issue with us.";
                $message->subject($subject);
                $message->from($admin_email, env('APP_NAME'));
                $message->to($to_email, $to_name);
            });

        }

        return view('frontend.user.reportissue')->with(
            [
                'title' => 'Report an Issue',
                'userinfo' => $user,
                'show_thanks' => (isset($request->message)) ? 1 : 0,
            ]
        );
    }

}
