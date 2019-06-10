<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function reservations()
    {
        $pending = Auth::user()->pendingInvoices();
        $past = Auth::user()->pastInvoices();

        return view('profile.reservations', compact('past','pending'));
    }
}
