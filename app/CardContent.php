<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class CardContent extends Eloquent
{
    //
    protected $connection ='mongodb';
    protected $fillable = ['content','list_id'];
}

