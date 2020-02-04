<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Lists extends Eloquent
{protected $connection ='mongodb';
    protected $fillable = ['name'];
    //
    

}
