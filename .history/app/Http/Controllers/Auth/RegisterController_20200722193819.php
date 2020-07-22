<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Notifications\ResumeUploaded;
use App\Notifications\WelcomeAuthor;
use App\Notifications\ResumeReceived;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Spatie\Honeypot\ProtectAgainstSpam;

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

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (Auth::check() && Auth::user()->role->id == 1)
        {
            $this->redirectTo = route('admin.dashboard');

        }elseif(Auth::check() && Auth::user()->role->id == 2)
        {
            $this->redirectTo = route('author.dashboard');

        } else {

            $this->redirectTo = route('freelancer.dashboard');
        }
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

         //fix registraion role id
         if($data['role_id']=='3'){

            return Validator::make($data, [
                'name' => 'required|string|max:50',
                'country'=>'required|string',
                'phone' => 'required|string|min:7|max:17|unique:users',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'specialty' => 'required|in:1,2',
                'resume' => 'required|mimes:pdf|file|max:4000',
                'terms'=>'required',
            ]);

        }else{

            return Validator::make($data, [
                'name' => 'required|string|min:2|max:50',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'terms'=>'required',
            ]);
        }

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //fix registraion role id
        $random = rand(2,20000);
        if($data['role_id']=='3'){
            //freelancer

            $role_id=3;
            $status=0;

            $slug = str_slug($data['name']);

            $username = $slug + $random;
            if($data['resume']){
                $resume=1;
                $resumePdf=$data['resume'];
            }

            $user = User::create([
                'role_id' => $role_id,
                'name' => $data['name'],
                'email' => $data['email'],
                'country' => $data['country'],
                'phone' => $data['phone'],
                'password' => Hash::make($data['password']),
                'status'=> $status,
                'specialty' => $data['specialty'],
                'resume' => $resume
            ]);

            //send notification to infoaswiftconnect

            Notification::route('mail',"info@aswiftconnect.com")
            ->notify(new  ResumeUploaded($user,$resumePdf));


            //send notification to freslancer

            Notification::route('mail',$user->email)
            ->notify(new  ResumeReceived($user));




        }else{
            //employer

            $role_id=2;
            $status=1;

            $user = User::create([
                'role_id' => $role_id,
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'status'=> $status
            ]);

             //send notification to employer

             Notification::route('mail',$user->email)
             ->notify(new  WelcomeAuthor($user));


        }

        return $user;
    }
}
