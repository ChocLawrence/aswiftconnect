<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class PostController extends Controller
{

    public function index()
    {
        
       // $posts=Post::paginate(2);
        if(Auth::check()){
            $userId= Auth::user()->role_id;
        }else{
            $userId=2; 
        }
        $categories=Category::all();
        $posts = Post::latest()->approved()->published()->paginate(2);
        Log::info("posts");
        Log::info($posts);
        return view('posts',compact('posts','categories','userId'));
    }
    public function details($slug)
    {
        if(Auth::check()){
            $userId= Auth::user()->role_id;
        }else{
            $userId=2; 
        }
        $url=URL::current();
        $categories=Category::all();
        $post = Post::where('slug',$slug)->approved()->published()->first();

        $blogKey = 'blog_' . $post->id;

        if (!Session::has($blogKey)) {
            $post->increment('view_count');
            Session::put($blogKey,1);
        }
        $randomposts = Post::approved()->published()->take(3)->inRandomOrder()->get();
        return view('post',compact('post','randomposts','url','categories','userId'));

    }

    public function postByCategory($slug)
    {
        $categories = Category::all();
        $category = Category::where('slug',$slug)->first();
        $posts = $category->posts()->approved()->published()->get();
        return view('category',compact('category','posts','categories'));
    }

    public function postByTag($slug)
    {
        $tag = Tag::where('slug',$slug)->first();
        $posts = $tag->posts()->approved()->published()->get();
        return view('tag',compact('tag','posts'));
    }

}
