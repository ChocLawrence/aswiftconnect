<?php

namespace App\Http\Controllers\freelancer;

use App\Category;
use App\Notifications\NewfreelancerPost;
use App\Notifications\PaymentComplete;
use App\Tag;
use App\Post;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $posts = Post::where('assigned_to',$user_id)->get();

        $incomplete = Post::where('assigned_to',$user_id)
                    ->where('is_completed',null)
                    ->count();
        return view('freelancer.post.index',compact('posts','incomplete'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //5% of amount
        return view('freelancer.post.show',compact('post'));
    }

}
