<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Comment extends Eloquent
{
    //
    protected $connection ='mongodb';
    protected $fillable = ['content_id','comment'];
}
