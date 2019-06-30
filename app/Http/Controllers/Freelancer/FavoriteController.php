<?php

namespace App\Http\Controllers\Freelancer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $posts = Auth::user()->favorite_posts;
        return view('freelancer.favorite',compact('posts'));
    }
}
