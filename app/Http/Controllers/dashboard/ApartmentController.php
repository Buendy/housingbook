<?php

namespace App\Http\Controllers\dashboard;

use App\Apartment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApartmentController extends Controller
{
    public function index()
    {
        $apartments = Apartment::where('user_id',auth()->user()->id)->paginate(6);

        return view('dashboard.apartment.index',compact('apartments'));
    }
}
