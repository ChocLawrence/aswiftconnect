<?php

namespace App\Http\Controllers\freelancer;

use App\Category;
use App\Notifications\NewfreelancerPost;
use App\Notifications\PaymentComplete;
use App\Tag;
use App\Project;
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

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $projects = Project::where('user_id',$user_id)->get();

        return view('freelancer.projects.index',compact('projects'));
    }

    public function create()
    {
        return view('freelancer.projects.create');
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
            'title' => 'required',
            'project_link' => 'required',
            'description' => 'required',
        ]);
        
        $project = new Project();
        $project->user_id = Auth::id();
        $project->title = $request->title;
        $project->project_link= $request->project_link;
        $project->description= $request->description;
        $project->save();

        // $post->categories()->attach($request->categories);
        // $post->tags()->attach($request->tags);

        // $users = User::where('role_id','1')->get();
        // Notification::send($users, new NewAuthorPost($post));
        Toastr::success('Project Successfully Added :)','Success');
        return redirect()->route('freelancer.projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($project)
    {
        $current_project = Project::findOrFail($project);
        return view('freelancer.projects.show',compact('current_project'));
    }

    public function edit($project)
    {
        $current_project = Project::findOrFail($project);

        if ($current_project->user_id !== Auth::id())
        {
            Toastr::error('You are not authorized to access this post','Error');
            return redirect()->back();
        }

        return view('freelancer.projects.edit',compact('current_project'));
    }

    /**
     * Update a value
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$project)
    {

        
        $current_project = Project::findOrFail($project);
        // Log::info("project object");
        // Log::info($current_project);

        if ($current_project->user_id !== Auth::id())
        {
            Toastr::error('You are not authorized to access this project','Error');
            return redirect()->back();
        }
        
        $this->validate($request,[
            'title' => 'required',
            'project_link' => 'required',
            'description' => 'required',
        ]);
        
        $current_project->user_id = Auth::id();
        $current_project->title = $request->title;
        $current_project->project_link= $request->project_link;
        $current_project->description= $request->description;
        $current_project->save();

        Toastr::success('Project Successfully Updated :)','Success');
        return redirect()->route('freelancer.projects.index');
    }


     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($project)
    {
        $current_project = Project::findOrFail($project);
        if ($current_project->user_id != Auth::id())
        {
            Toastr::error('You are not authorized to access this project','Error');
            return redirect()->back();
        }

        $current_project->delete();
        Toastr::success('Project Successfully Deleted :)','Success');
        return redirect()->back();
    }

}
