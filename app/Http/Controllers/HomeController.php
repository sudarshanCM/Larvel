<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lists;
use App\Events\adminDeleteEvent;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    //  dd(session('login_data'));
        // dd($form);
        $user1 = auth()->user();
        if($user1->role=='user'){
        return redirect()->action('PostsController@home');
        }
        else{
            $lists = Lists::all();
            event(new adminDeleteEvent('Your list has been deleted'));
            return view('home',compact('lists'));
        }
        // return view('home');
    }
}
