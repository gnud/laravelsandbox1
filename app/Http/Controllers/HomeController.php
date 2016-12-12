<?php

namespace App\Http\Controllers;

use App\Article;
use App\Country;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::all();
        return view('articles')->with('articles', $article);
//        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile($username)
    {
        $user = User::where('name', $username)->firstOrFail();

        return view('profile')->with('user', $user);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function posts($countryId)
    {
        $country = Country::findOrfail($countryId);

        return view('country_posts')->with('country', $country);
    }
}
