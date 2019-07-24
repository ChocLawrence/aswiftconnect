<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
// Add this line

class BrowseController extends Controller
{

    public function search(Request $request)
    {
       // $project_owners = new Collection();
       // $users = DB::table('users')->distinct()->get();
       // $ids= DB::table('projects')
         //   ->select('user_id')
         //   ->distinct()
         //   ->pluck('user_id');

        //$project_owners= User::findMany($ids);
       
        $categories=Category::all();
        $query = $request->input('query');
       // $projects =  $project_owners->where('name','LIKE',"%$query%");
       $project_owners = User::whereHas(
        'role', function($q){
            $q->where('role_id', '3');
        })->where('name','LIKE',"%$query%")->get();

        Log::info("project owner searched");    
        Log::info($project_owners);

        return view('browse',compact('query','project_owners','categories'));
    }

    public function details($name)
    {
        $current_user=Auth::id();
        if(Auth::check()){
            $userId= Auth::user()->role_id;
        }else{
            $userId=2; 
        }

        $categories=Category::all();
        $userInfo = User::where('name',$name)->first();
        $all_projects=Project::where('user_id', $userInfo->id)->get();
        $count=Project::where('user_id', $userInfo->id)->count();

        Log::info($all_projects);

        // $blogKey = 'blog_' . $post->id;

        // if (!Session::has($blogKey)) {
        //     $post->increment('view_count');
        //     Session::put($blogKey,1);
        // }
        // $randomposts = Post::approved()->published()->take(3)->inRandomOrder()->get();
        return view('freelancerdetails',compact('userInfo','all_projects','count','categories'));

    }
}
