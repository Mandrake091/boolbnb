<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    protected $guarded = [];
    public function houses()
    {
        return $this->belongsToMany('App\House');
    }
}