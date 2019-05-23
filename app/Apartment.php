<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = ['name','description','address','short_description','city_id','user_id', 'price'];

    public static $rules = [
        'name' => 'required | min:3 | unique:apartments,name',
        'description' => 'required | min:3 | max:300',
        'address' => 'required | min:10 | max:100',
        'short_description' => 'required | min:3 | max: 100',
        'city' => 'required | exists:cities,id',
        'services' => 'required',
        'category' => 'required',
        'price' => 'required',
    ];

    /*public static $messages = [
        'name.required' => 'El nombre es obligatorio',
        'name.min' => 'El campo nombre es demasiado corto',
        'name.unique' => 'El nombre del curso ya está en uso',
        'description.required' => 'El campo descripción es obligatorio',
        'description.min' => 'El campo descripción es demasiado corto',
        'description.max' => 'El campo descripción es demasiado largo',
        'address.required' => 'El campo descripción es obligatorio',
        'address.min' => 'El campo descripción es demasiado corto',
        'address.max' => 'El campo descripción es demasiado largo',
        'short_description.required' => 'El campo descripción es obligatorio',
        'short_description.min' => 'El campo descripción es demasiado corto',
        'short_description.max' => 'El campo descripción es demasiado largo',
        'city_id.required' => 'El campo descripción es obligatorio',
        'city_id.exists' => 'El campo descripción es demasiado corto',
    ];*/

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
        return $this->belongsToMany(User::class)->withPivot('entry', 'exit')->whereBetween('entry',[$entrada,$salida])->orWhereBetween('exit',[$entrada,$salida]);
    }

    public function getDatesRented($id)
    {
        return $this->belongsToMany(User::class)->withPivot('entry', 'exit')->wherePivot('user_id',$id)->latest()->get(['entry','exit']);
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
