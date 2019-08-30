<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use BrightNucleus\CountryCodes\Country;
use CountryFlag;

class AuthorController extends Controller
{
    public function profile($username)
    {
        if(Auth::check()){
            $userId= Auth::user()->role_id;
        }else{
            $userId=2; 
        }

        

        $categories=Category::all();
        $author = User::where('username',$username)->first();
        // Get the name from an ISO 3166 country code.
        $countryName = Country::getNameFromCode( $author->country ); // Returns 'United States'.
        $countryFlag=CountryFlag::get($author->country);

        $posts = $author->posts()->approved()->published()->get();
        return view('profile',compact('author','posts','categories','userId','countryName','countryFlag'));
    }
}
