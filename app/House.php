<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class House extends Model
{
    public static function generateSlug($title)
    {
        $slug = Str::of($title)->slug('-');
        $count = 1;
        while (House::where('slug', $slug)->first()) {
            $slug = Str::of($title)->slug('-') . "-{$count}";
            $count++;
        }
        return $slug;
    }
    
    protected $guarded = [];
    public function type()
    {
        return $this->belongsTo('App\Type');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
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