<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $guarded = [];
    public function type()
    {
        return $this->belongsTo('App\Type');
    }
    public function host()
    {
        return $this->belongsTo('App\Host');
    }
}