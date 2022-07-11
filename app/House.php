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
    public function views()
    {
        return $this->hasMany('App\View');
    }
    public function messages()
    {
        return $this->hasMany('App\Message');
    }
    public function services()
    {
        return $this->belongsToMany('App\Service');
    }
    public function sponsorships()
    {
        return $this->belongsToMany('App\Sponsorship');
    }
}