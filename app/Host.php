<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Host extends Model
{
    protected $guarded = [];
    public function houses()
    {
        return $this->hasMany('App\House');
    }
}