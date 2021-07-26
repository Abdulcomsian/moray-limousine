<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Lunaweb\EmailVerification\Traits\VerifiesEmail;
use Illuminate\Auth\Events\Registered;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers ;
    use VerifiesEmail;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['verify', 'showResendVerificationEmailForm', 'resendVerificationEmail']]);
        $this->middleware('auth', ['only' => ['showResendVerificationEmailForm', 'resendVerificationEmail']]);
//        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
         return Validator::make($data, [
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|max:25',
            'password' => 'required|string|min:6|confirmed',
            'user_type' => 'required|string|max:15',
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    //override register method
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
         if($user->user_type!='end_user')
         {
          $this->guard()->login($user);
         }

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
        
    }
   
     protected function registered(Request $request, $user)
    {
        if (session('link')){
            return redirect(session('link'));
        }
        elseif($user->user_type == 'admin') {
            return redirect('/admin/index');
        } elseif($user->user_type == 'driver') {
            return redirect('/driver/dashboard');

        } elseif ($user->user_type == 'partner'){
            return redirect('/partner/dashboard');
        }
        else {
            Session::flash('message', 'We have e-mailed your account activation link!.');
            return redirect('/login');
        }
    }
    //
    protected function create(array $data)
    {
        return User::create([

            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'user_type' => $data['user_type'],
            'password' => Hash::make($data['password']),
        ]);
    }

}
