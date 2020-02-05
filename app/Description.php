<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Description extends Eloquent
{
    //
    protected $connection ='mongodb';
    protected $fillable = ['content_id','description'];
}
