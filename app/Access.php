<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Access extends Eloquent
{
    //
    protected $connection ='mongodb';
    protected $fillable = ['access_id','project_id','user_id'];
}
