<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Notify extends Eloquent
{
    //
    protected $connection ='mongodb';
    protected $fillable = ['cardCreatedBy','content','list_id'];
}
