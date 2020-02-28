<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Project;
use App\Lists;
use App\Events\adminDeleteEvent;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers ;
       



    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        // return redirect()->action('PostsController@home');
    }
    public function showLoginForm()
    {
        $projects = Project::all();

        return view('auth.login', compact('projects'));
    }

//     protected function sendLoginResponse(Request $request)
// {
//     $request->session()->regenerate();

//     $this->clearLoginAttempts($request);

//     session(['login_data' => $request->all() ]);

//     return $this->authenticated($request, $this->guard()->user())
//         ?: redirect()->intended($this->redirectPath());
// }
protected function authenticated(Request $request, $user)
{
     $project = $request->get('type');
    //  dd("HEY",$project);
    // $request->session()->flash('form_type', 'login');
    // dd($request);
    $user1 = auth()->user();
    if($user1->role=='user'){
    return redirect()->action('PostsController@home',['project'=>$project]);
    }
    else{
        $lists = Lists::all();
        event(new adminDeleteEvent('Your list has been deleted'));
        return view('home',compact('lists'));
    }

 return redirect('/home');
}

    
}
