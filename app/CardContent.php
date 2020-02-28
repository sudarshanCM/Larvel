<?php

namespace App;
use App\Notifications\projectCardNotification;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use App\User;
// use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Autheticatable;
use App\Overrides\Notifications\Notifiable\Notifiable;
use Illuminate\Support\Facades\Notification;
use Jenssegers\Mongodb\Auth\User as Authenticatable;

// use Notification;

class CardContent extends Eloquent
{
  use AuthenticatableTrait;
    use Notifiable;
    //
    
    protected $connection ='mongodb';
    protected $fillable = ['content','list_id','cardCreatedBy','assignedTo'];


    public static function boot()
    {
      
        parent::boot();

        static::created(function($model){

            // $admins = User::all()->filter(function($user){
            //     return $user::where('role', 'admin')->get();
            // });
            // $det=['data'=>'hi'];
          // $org =User::where('role', 'admin')->get();
            // dd($model);
            // $user = User::first();
            // dd($user->name);
          // Notification::send($org,new CardMoved($model));
        //
        // $user->notify(new CardMoved($model));
        $org =User::where('project', 'Project 1')->get();
            
        Notification::send($org,new projectCardNotification($model));
        });
        
        
    }
   
}

