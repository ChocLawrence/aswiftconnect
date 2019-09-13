<?php

namespace App\Http\Controllers\freelancer;

use App\Category;
use App\Notifications\NewfreelancerPost;
use App\Notifications\PaymentComplete;
use App\Tag;
use App\Skill;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $skills = Skill::where('user_id',$user_id)->get();

        return view('freelancer.skills.index',compact('skills'));
    }

    public function create()
    {
        return view('freelancer.skills.create');
    }


     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|min:2|max:15',
            'skill_link' => 'required',
            'description' => 'required|min:25|max:100',
        ]);
        
        $Skill = new Skill();
        $Skill->user_id = Auth::id();
        $Skill->title = $request->title;
        $Skill->skill_link= $request->skill_link;
        $Skill->description= $request->description;
        $Skill->save();

        // $post->categories()->attach($request->categories);
        // $post->tags()->attach($request->tags);

        // $users = User::where('role_id','1')->get();
        // Notification::send($users, new NewAuthorPost($post));
        Toastr::success('Skill Successfully Added :)','Success');
        return redirect()->route('freelancer.skills.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($skill)
    {
        $current_skill = Skill::findOrFail($skill);
        return view('freelancer.skills.show',compact('current_skill'));
    }

    public function edit($skill)
    {
        $current_skill = Skill::findOrFail($skill);

        if ($current_skill->user_id !== Auth::id())
        {
            Toastr::error('You are not authorized to access this skill','Error');
            return redirect()->back();
        }

        return view('freelancer.skills.edit',compact('current_skill'));
    }

    /**
     * Update a value
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$skill)
    {

        
        $current_skill = Skill::findOrFail($skill);
        // Log::info("Skill object");
        // Log::info($current_skill);

        if ($current_skill->user_id !== Auth::id())
        {
            Toastr::error('You are not authorized to access this Skill','Error');
            return redirect()->back();
        }
        
        $this->validate($request,[
            'title' => 'required',
            'skill_link' => 'required',
            'description' => 'required',
        ]);
        
        $current_skill->user_id = Auth::id();
        $current_skill->title = $request->title;
        $current_skill->skill_link= $request->skill_link;
        $current_skill->description= $request->description;
        $current_skill->save();

        Toastr::success('Skill Successfully Updated :)','Success');
        return redirect()->route('freelancer.skills.index');
    }


     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($Skill)
    {
        $current_skill = Skill::findOrFail($Skill);
        if ($current_skill->user_id != Auth::id())
        {
            Toastr::error('You are not authorized to access this Skill','Error');
            return redirect()->back();
        }

        $current_skill->delete();
        Toastr::success('Skill Successfully Deleted :)','Success');
        return redirect()->back();
    }

}
