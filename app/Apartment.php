<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function getPhotoImageAttribute()
    {
        return 'storage/photos/' . $this->photos()->first()->local_url;
    }
}
