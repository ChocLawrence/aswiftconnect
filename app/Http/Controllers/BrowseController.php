<?php

namespace App\Http\Controllers;

use App\Project;
use App\Skill;
use App\User;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use BrightNucleus\CountryCodes\Country;
use CountryFlag;
// Add this line

class BrowseController extends Controller
{

    public function search(Request $request)
    {
       
        $categories=Category::all();
        $query = $request->input('query');
       // $projects =  $project_owners->where('name','LIKE',"%$query%");
       $project_owners = User::whereHas(
        'role', function($q){
            $q->where('role_id', '3')->where('is_accepted', 1);
        })->where('name','LIKE',"%$query%")->with('skills')->get();


        // Log::info("skills"); 
        // Log::info($project_owners);


         // Get the name from an ISO 3166 country code.
        // $countryName = Country::getNameFromCode( $author->country ); // Returns 'United States'.
        // $countryFlag=CountryFlag::get($author->country);
 

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
        $all_skills=Skill::where('user_id', $userInfo->id)->get();
        $skill_count=Skill::where('user_id', $userInfo->id)->count();
        $project_count=Project::where('user_id', $userInfo->id)->count();
        $countryName = Country::getNameFromCode( $userInfo->country ); // Returns 'United States'.
        $countryFlag=CountryFlag::get($userInfo->country);
 

        // $randomposts = Post::approved()->published()->take(3)->inRandomOrder()->get();
        return view('freelancerdetails',compact('userInfo','all_projects','all_skills','project_count','skill_count','categories','countryName','countryFlag'));

    }
}
