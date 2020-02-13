<?php

namespace App;
use App\Notifications\CardMoved;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

use App\User;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Autheticatable;

use Illuminate\Support\Facades\Notification;
use Jenssegers\Mongodb\Auth\User as Authenticatable;

// use Notification;

class CardContent extends Eloquent
{
    // use Notifiable;
    //
    protected $connection ='mongodb';
    protected $fillable = ['content','list_id'];


    public static function boot()
    {
        parent::boot();

        static::created(function($model){

            // $admins = User::all()->filter(function($user){
            //     return $user::where('role', 'admin')->get();
            // });
            // $det=['data'=>'hi'];
          $org =User::where('role', 'admin')->get();
            // dd($model);
            // $user = User::first();
            // dd($user->name);
          Notification::send($org,new CardMoved($model));
        //
        // $user->notify(new CardMoved($model));
        
        });
        
        
    }
   
}

