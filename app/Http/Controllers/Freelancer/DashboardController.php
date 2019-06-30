<?php

namespace App\Http\Controllers\Freelancer;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
       // $user = Auth::user();
        $postcount=Post::all()->count();
        $popular_posts = Post::select('*')
            ->withCount('comments')
            ->withCount('favorite_to_users')
            ->orderBy('view_count','desc')
            ->orderBy('comments_count')
            ->orderBy('favorite_to_users_count')
            ->take(10)->get();

        $user_id = Auth::id();

        $earnings= Post::where('assigned_to',$user_id)
                    ->where('is_completed',true)
                    ->sum('earning');


        $assigned = Post::where('assigned_to',$user_id)
                    ->count();
        $incomplete = Post::where('assigned_to',$user_id)
                    ->where('is_completed',false)
                    ->count();        
        $complete = Post::where('assigned_to',$user_id)
                    ->where('is_completed',true)
                    ->count();            
            

        Log::info("complete count");    
        Log::info($complete);    
        return view('freelancer.dashboard',compact('popular_posts','postcount','assigned','incomplete','complete','earnings'));
    }
}
