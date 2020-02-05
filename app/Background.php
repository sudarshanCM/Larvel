<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Background extends Eloquent
{
    //
    protected $connection ='mongodb';
    protected $fillable = ['cover_image'];
}
