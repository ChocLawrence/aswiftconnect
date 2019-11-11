<?php

namespace App\Http\Controllers\Freelancer;

use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Notifications\ResumeUploaded;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SettingsController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $freelancer = User::find($user_id);
        Log::info($freelancer);
        return view('freelancer.settings',compact('freelancer'));
    }

    public function updateProfile(Request $request)
    {
        $user_id = Auth::id();
        
        $u = User::find($id);
        Log::info('>>>');


        $rules = [
            'name' => 'required|string|min:2|max:50',
            //'email' => 'required|string|max:50|unique:users,email,',
            //'email' => 'required|email|max:255|unique:users,email,'.Auth::user()->id.',id',
            //'email' => 'required|email|unique:users,email,'.Auth::user()->id,
            'email' => 'required|email|max:255|unique:users,email,' .Auth::id(),
            'phone' => 'required|string|min:7|max:17|',
            'about' => 'required|min:30|max:300'
        ];

        $this->validate($request, $rules);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        $user = User::findOrFail(Auth::id());
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('profile'))
            {
                Storage::disk('public')->makeDirectory('profile');
            }
//            Delete old image form profile folder
            if (Storage::disk('public')->exists('profile/'.$user->image))
            {
                Storage::disk('public')->delete('profile/'.$user->image);
            }
            $profile = Image::make($image)->resize(500,500)->save();
            Storage::disk('public')->put('profile/'.$imageName,$profile);
        } else {
            $imageName = $user->image;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        
        if (isset($image)){
            $user->image = $imageName;
        }

        $country=$request->country;
        $linkedin_url=$request->linkedin_url;
        $github_url=$request->github_url;
        $facebook_url=$request->facebook_url;
        $twitter_url=$request->twitter_url;

        //check if linkedin,country++
        if(isset($country)){
            $user->country = $country;
        }

        if(isset($linkedin_url)){
            $user->linkedin_url= $linkedin_url;
        }

        if(isset($github_url)){
            $user->github_url= $github_url;
        }

        if(isset($facebook_url)){
            $user->facebook_url= $facebook_url;
        }

        if(isset($twitter_url)){
            $user->twitter_url= $twitter_url;
        }


        $user->about = $request->about;
        $user->save();
        Toastr::success('Profile Successfully Updated :)','Success');
        return redirect()->back();
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request,[
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password,$hashedPassword))
        {
            if (!Hash::check($request->password,$hashedPassword))
            {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Toastr::success('Password Successfully Changed','Success');
                Auth::logout();
                return redirect()->back();
            } else {
                Toastr::error('New password cannot be the same as old password.','Error');
                return redirect()->back();
            }
        } else {
            Toastr::error('Current password not match.','Error');
            return redirect()->back();
        }

    }

    public function uploadResume(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'resume' => 'required|mimes:pdf'
        ]);
        
        $resume = $request->file('resume');
        $user = User::findOrFail(Auth::id());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->resume=1;
       

        Log::info($resume);

        if (isset($resume)){

            //stor in memory
            $user->save();


           //send notification to freelancer
           Notification::route('mail',$user->email)
           ->notify(new  ResumeReceived($user));
          

           //send notification to infoaswiftconnect

            Notification::route('mail',"info@aswiftconnect.com")
            ->notify(new  ResumeUploaded($user,$resume));
           

           Toastr::success('Resume Successfully Uploaded:)','Success'); 

        }
        return redirect()->back();
    }
}
