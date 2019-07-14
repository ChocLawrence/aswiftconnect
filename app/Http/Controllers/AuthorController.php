<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function profile($username)
    {

        $categories=Category::all();
        $author = User::where('username',$username)->first();
        $posts = $author->posts()->approved()->published()->get();
        return view('profile',compact('author','posts','categories'));
    }
}
