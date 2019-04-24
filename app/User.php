<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','last_name', 'email', 'password','address','second_address','photo','phone','telegram'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function apartments()
    {
        return $this->hasMany(Apartment::class);
    }

    public static $rules = [
        'name' => 'required | min:3 | unique:apartments,name',
        'last_name' => 'required | min:3 | max:300',
        'email' => 'required | min:10 | max:100 | unique:users,email',
        'address' => 'required',
        'phone' => 'required',
    ];

    public static $rulesTelegram = [
      'telegram' => 'required | numeric'
    ];

    public static $rulesPassword = [
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ];
}
