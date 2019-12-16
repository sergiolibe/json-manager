<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Json extends Model
{
    protected $fillable = [
        'project_id','body',
    ];
}
