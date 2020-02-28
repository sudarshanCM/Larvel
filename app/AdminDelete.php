<?php

namespace App;

use App\Notifications\adminDeleteNotification;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use App\User;
// use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Autheticatable;
use App\Overrides\Notifications\Notifiable\Notifiable;
use Illuminate\Support\Facades\Notification;
use Jenssegers\Mongodb\Auth\User as Authenticatable;

class AdminDelete extends Eloquent
{
    //
    use AuthenticatableTrait;
    use Notifiable;
    public $data;
    public function __construct($data)
    {
        //
        $this->data = $data;
        // dd($data);
        $org =User::where('name', $data)->get();
        // dd($org);
        Notification::send($org,new adminDeleteNotification($data));
    }
    public static function boot()
    {
      
        parent::boot();

        static::created(function(){

            // $admins = User::all()->filter(function($user){
            //     return $user::where('role', 'admin')->get();
            // });
            // $det=['data'=>'hi'];
          $org =User::where('name', $data)->get();
            // dd($model);
            // $user = User::first();
            // dd($user->name);
            // dd($org);
          Notification::send($org,new adminDeleteNotification($model));
        //
        // $user->notify(new CardMoved($model));
        
        });
        
        
    }
}
