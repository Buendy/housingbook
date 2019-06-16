<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = ['name','description','address','short_description','city_id','user_id', 'price'];

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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function checkDisponibility($entrada,$salida)
    {
        return $this->belongsToMany(User::class)->withPivot('entry', 'exit')->whereBetween('entry',[$entrada,$salida])->WhereBetween('exit',[$entrada,$salida]);
    }

    public function getDatesRented($id)
    {
        return $this->belongsToMany(User::class)->withPivot('entry', 'exit')->wherePivot('user_id',$id)->latest('apartment_user.created_at')->first();
    }

    public function noAvailableDates()
    {
        return $this->belongsToMany(User::class)->withPivot('entry','exit')->get(['entry','exit']);
    }

    public function getReservedDates()
    {
        return $this->belongsToMany(User::class)->withPivot('entry','exit')->get(['entry','exit','name']);
    }

    public function getMoneyGained()
    {
        return $this->belongsToMany(User::class)->withPivot('total')->get(['total']);
    }

    public function getPhotoImageAttribute()
    {
        return 'storage/photos/' . $this->photos()->first()->local_url;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
