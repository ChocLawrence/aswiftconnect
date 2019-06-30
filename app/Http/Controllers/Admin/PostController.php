<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Notifications\AuthorPostApproved;
use App\Notifications\FreelancerAssign;
use App\Notifications\ProjectAssign;
use App\Notifications\InvoiceSetPost;
use App\Notifications\JobCompletedToFreelancer;
use App\Notifications\JobCompletedToAuthor;
use App\Notifications\JobInCompleteToFreelancer;
use App\Notifications\NewPostNotify;
use App\Subscriber;
use App\Tag;
use App\Post;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use DB;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create',compact('categories','tags'));
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
            'image' => 'required',
            'categories' => 'required',
            'tags' => 'required',
            'body' => 'required',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('post'))
            {
                Storage::disk('public')->makeDirectory('post');
            }

            $postImage = Image::make($image)->resize(1600,1066)->save();
            Storage::disk('public')->put('post/'.$imageName,$postImage);

        } else {
            $imageName = "default.png";
        }
        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->image = $imageName;
        $post->body = $request->body;
        if(isset($request->status))
        {
            $post->status = true;
        }else {
            $post->status = false;
        }
        $post->is_approved = true;
        $post->save();

        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);

        Toastr::success('Post Successfully Saved :)','Success');
        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // $freelancers = User::findorFail(3)->whereHas('posts', function($q){
        //     $q->WhereNull('assigned_to');
        // })->get();
        
        $assigned=DB::table('posts')->select(array('assigned_to','is_completed'))->whereNotNull('assigned_to')
            ->where('is_completed',false)
            ->pluck('assigned_to')->toArray();

        $freelancers = User::where('role_id',3)
            ->where('is_accepted',true)
            ->whereNotIn('id', $assigned)
            ->get();

        $assignedId=$post->assigned_to;
        $assignedFreelancer=User::find($assignedId);
    
        Log::info("Assigned");    
        Log::info($assignedFreelancer);
        // $freelancers = User::freelancers()
        //    ->withCount('comments')
        //    ->withCount('favorite_posts')
        //    ->get();

        return view('admin.post.show',compact('post','freelancers','assignedFreelancer'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.edit',compact('post','categories','freelancers','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $this->validate($request,[
            'title' => 'required',
            'image' => 'image',
            'categories' => 'required',
            'tags' => 'required',
            'body' => 'required',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('post'))
            {
                Storage::disk('public')->makeDirectory('post');
            }
//            delete old post image
            if(Storage::disk('public')->exists('post/'.$post->image))
            {
                Storage::disk('public')->delete('post/'.$post->image);
            }
            $postImage = Image::make($image)->resize(1600,1066)->save();
            Storage::disk('public')->put('post/'.$imageName,$postImage);

        } else {
            $imageName = $post->image;
        }

        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->image = $imageName;
        $post->body = $request->body;
        if(isset($request->status))
        {
            $post->status = true;
        }else {
            $post->status = false;
        }
        $post->is_approved = true;
        $post->save();

        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);

        Toastr::success('Post Successfully Updated :)','Success');
       return redirect()->route('admin.post.index');

          
    }


    public function pending()
    {
        $posts = Post::where('is_approved',false)->get();
        return view('admin.post.pending',compact('posts'));
    }

    public function approval($id)
    {
        $post = Post::find($id);
        if ($post->is_approved == false)
        {
            $post->is_approved = true;
            $post->save();
            $post->user->notify(new AuthorPostApproved($post));

            $subscribers = Subscriber::all();
            foreach ($subscribers as $subscriber)
            {
                Notification::route('mail',$subscriber->email)
                    ->notify(new NewPostNotify($post));
            }



            Toastr::success('Post Successfully Approved :)','Success');
        } else {
            Toastr::info('This Post is already approved','Info');
        }
        return redirect()->back();
    }

    public function assign($postid,$userid)
    {
        
        $post = Post::find($postid);
        
        $post->assigned_to = $userid;
        Log::info('selected project is '.$postid);
        Log::info('selected user is '.$userid);
        
        $currentDate = Carbon::now()->toDateString();
        $post->assigned_date=$currentDate;
        $post->save();

        //send notification to freelancer

        $user= User::find($userid);
        Notification::route('mail',$user->email)
        ->notify(new  FreelancerAssign($post,$user));


        //send notification to author

        $author= User::find($post->user_id);
            Notification::route('mail',$author->email)
            ->notify(new  ProjectAssign($post));

    
        Toastr::success('Project Assigned Successfully :)','Success');

        return redirect()->back();
    }



    public function setinvoice(Request $request, $id)
    {
        $post = Post::find($id);
        if ($post->is_paid == false)
        {
            //can set invoice

            $this->validate($request,[
                'amount' => 'required',
                'deadline' => 'required'
            ]);

            $post->amount=$request->amount;
            $post->earning=$post->amount-($post->amount * 5/100);
            $post->deadline=$request->deadline;
            $post->save();

            //send notification to author
            Toastr::success('Invoice Successfully set :)','Success');

        } else {
            Toastr::info('Cannot set invoice which has been paid for','Info');
        }
        return redirect()->back();
    }

    public function complete($id)
    {
        $post = Post::find($id);
        $post->is_completed = true;
        $currentDate = Carbon::now()->toDateString();
        $post->is_completed_at=$currentDate;
        $post->save();


        $userid = $post->assigned_to;

        
        $freelancer=User::find($userid);

        //notify freelancer and make payment 
        Notification::route('mail',$freelancer->email)
        ->notify(new  JobCompletedToFreelancer($post,$freelancer));
            

        $author=User::find($post->user_id);

        //notify author
        Notification::route('mail',$author->email)
        ->notify(new   JobCompletedToAuthor($post));

        Toastr::success('Job successfully completed:)','Success');
       
        return redirect()->back();
    }

    public function incomplete($id)
    {
        $post = Post::find($id);
        $post->is_completed = false;
        $post->is_completed_at=null;
        $post->save();

        $userid = $post->assigned_to;

        $freelancer=User::find($userid);

        //notify freelancer and make payment 
        Notification::route('mail',$freelancer->email)
        ->notify(new  JobInCompleteToFreelancer($post,$freelancer));
            

        $author=User::find($post->user_id);

        //notify author
        // Notification::route('mail',$author->email)
        // ->notify(new   JobInCompletedToAuthor($post));

        Toastr::success('Job marked as incomplete:)','Success');
       
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (Storage::disk('public')->exists('post/'.$post->image))
        {
            Storage::disk('public')->delete('post/'.$post->image);
        }
        $post->categories()->detach();
        $post->tags()->detach();
        $post->delete();
        Toastr::success('Post Successfully Deleted :)','Success');
        return redirect()->back();
    }


}
