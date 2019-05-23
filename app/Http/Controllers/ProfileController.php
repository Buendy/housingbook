<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth','verified']);
    }

    public function index(Request $request)
    {

        $user = User::where('name', '=', $request->name)->firstOrFail();

        $nums = 1;
        $nums2 = 0;
        return view('profile.index', compact('user', 'nums', 'nums2'));
    }

    /*public function apartments()
    {
        $apartments = Apartment::where('user_id',auth()->user()->id)->paginate(6);
        return view('profile.apartments.index',compact('apartments'));
    }*/

    public function editProfile()
    {

    }
}
