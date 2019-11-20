<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Events\Frontend\Auth\UserRegistered;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Auth\RegisterRequest;
use App\Repositories\Frontend\Access\User\UserRepository;
use Illuminate\Foundation\Auth\RegistersUsers;
use DB;

/**
 * Class RegisterController.
 */
class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * RegisterController constructor.
     *
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        // Where to redirect users after registering
        $this->redirectTo = route('frontend.index');

        $this->user = $user;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $countries = DB::table('apps_countries')->select('country_name')->orderBy('country_name','Asc')->get()->keyBy('country_name')->toArray();
        $country = [
            '' => 'Select Country',
        ];
        if ($countries) {
            foreach($countries as $name => $coun) {
                $country[$name] = $name;
            }
        }
        return view('frontend.auth.register')->with([
            'title' => 'Register',
            'countries' => $country,
        ]);
    }

    /**
     * @param RegisterRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register(RegisterRequest $request)
    {
        /*if (config('access.users.confirm_email')) {
            $user = $this->user->create($request->all());
            event(new UserRegistered($user));

            return redirect($this->redirectPath())->withFlashSuccess(trans('exceptions.frontend.auth.confirmation.created_confirm'));
        } else {
            access()->login($this->user->create($request->all()));
            event(new UserRegistered(access()->user()));

            return redirect($this->redirectPath());
        }*/

        if (config('access.users.confirm_email') || config('access.users.requires_approval')) {

            $user = $this->user->create($request->only('role','first_name', 'last_name', 'email', 'password', 'phone', 'address', 'address_2', 'city', 'state', 'zip', 'latitude', 'longitude', 'country', 'is_term_accept'));
            event(new UserRegistered($user));

            $inputs = $request->all();

            if (isset($inputs['opt_notification']) || isset($inputs['subscribe'])) {
                $values = [
                    'email' => $inputs['email'],
                    'status' => (isset($inputs['subscribe'])) ? 1 : 0,
                    'allow_notification' => (isset($inputs['opt_notification'])) ? 1 : 0,
                ];
                $this->insertIgnore($values);
            }

            return redirect('thankyou')->withFlashSuccess(
                config('access.users.requires_approval') ?
                    trans('exceptions.frontend.auth.confirmation.created_pending') :
                    trans('exceptions.frontend.auth.confirmation.created_confirm')
            );
        } else {
            access()->login($this->user->create($request->only('role','first_name', 'last_name', 'email', 'password', 'phone', 'address', 'address_2', 'city', 'state', 'zip', 'country', 'is_term_accept')));
            event(new UserRegistered(access()->user()));

            return redirect('thankyou');
        }
    }

    public static function insertIgnore($array) {

        $array['created_at'] = date("Y-m-d h:i:s");
        $array['updated_at'] = date("Y-m-d h:i:s");

        DB::insert('INSERT IGNORE INTO newsletter_subscribers ('.implode(',',array_keys($array)).
            ') values (?'.str_repeat(',?',count($array) - 1).')',array_values($array));
    }
}
