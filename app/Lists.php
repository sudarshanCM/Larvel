<?php

namespace App;

use App\Notifications\projectNotification;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use App\User;
// use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Autheticatable;
use App\Overrides\Notifications\Notifiable\Notifiable;
use Illuminate\Support\Facades\Notification;
use Jenssegers\Mongodb\Auth\User as Authenticatable;

class Lists extends Eloquent

{
    use AuthenticatableTrait;
    use Notifiable;
    protected $connection ='mongodb';
    protected $fillable = ['name','cardCreatedBy'];
    //
    public static function boot()
    {
      
        parent::boot();

        static::created(function($model){

        
          $org =User::where('project', 'Project 1')->get();
            
          Notification::send($org,new projectNotification($model));
     
        
        });
        
        
    }

    
}
