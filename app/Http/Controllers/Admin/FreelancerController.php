<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Support\Facades\Log;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Notifications\FreelancerVetMeeting;
use App\Notifications\FreelancerSetTest;
use App\Notifications\FreelancerAccepted;
use App\Notifications\FreelancerRejected;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;


class FreelancerController extends Controller
{
    public function index()
    {
       $freelancers = User::freelancers()
           ->get();
       return view('admin.freelancer.index',compact('freelancers'));
    }

    public function show($id)
    {
        // $freelancers = User::findorFail(3)->whereHas('posts', function($q){
        //     $q->WhereNull('assigned_to');
        // })->get();
        

        $freelancer = User::find($id);

        Log::info("Freelancer");    
        Log::info($freelancer);
        // $freelancers = User::freelancers()
        //    ->withCount('comments')
        //    ->withCount('favorite_posts')
        //    ->get();

        return view('admin.freelancer.show',compact('freelancer'));
    }

    public function settestinfo(Request $request, $id)
    {
       
        $user = User::find($id);
        $this->validate($request,[
            'vet_url' => 'required',
            'vet_deadline' => 'required'
        ]);

     
        $user->vet_url=$request->vet_url;
        $user->vet_deadline=$request->vet_deadline;
        
        $user->save();


        //send notification to freelancer

        Notification::route('mail',$user->email)
        ->notify(new  FreelancerSetTest($user));

        Toastr::info('Freelancer Test Set Successfully','Success');
     
        return redirect()->back();
    }


    public function setmeetinginfo(Request $request, $id)
    {
       
        $user = User::find($id);
        $this->validate($request,[
            'time' => 'required',
            'date' => 'required'
        ]);

        $user->vet_time=$request->time;
        $user->vet_date=$request->date;

        $user->save();


        //send notification to freelancer

        Notification::route('mail',$user->email)
        ->notify(new  FreelancerVetMeeting($user));

        Toastr::info('Vet Meeting Set Successfully','Info');
     
        return redirect()->back();
    }

    public function accept($id){

        $user = User::find($id);
        if ($user->is_accepted == false)
        {
            $user->is_accepted = true;
            $user->status = true;
            $user->save();
            $user->notify(new FreelancerAccepted($user));

            Toastr::success('Freelancer Accepted Successfully :)','Success');
        } else {
            Toastr::info('This Freelancer is already accepted','Info');
        }

        return redirect()->back();
    }

    public function reject($id){

        $user = User::find($id);
        $user->is_accepted = false;
        $user->status = true;
        $user->save();
        $user->notify(new FreelancerRejected($user));

        Toastr::success('Freelancer Rejected Successfully :)','Success');
    
        return redirect()->back();

    }

    public function destroy($id)
    {
        $freelancer = User::findOrFail($id)->delete();
        Toastr::success('Freelancer Successfully Deleted','Success');
        return redirect()->back();
    }


}
