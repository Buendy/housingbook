<?php

namespace App\Http\Controllers;

use App\Apartment;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        return view('profile.index');
    }

    public function apartments()
    {
        $apartments = Apartment::where('user_id',auth()->user()->id)->paginate(6);
        return view('profile.apartments.index',compact('apartments'));
    }

    public function editProfile()
    {

    }
}
