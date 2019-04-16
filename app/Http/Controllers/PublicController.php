<?php

namespace App\Http\Controllers;

use App\Apartment;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $apartments = Apartment::with('city','user','photos')->paginate(6);
        $latest_apartment = Apartment::latest()->take(3)->get();

        return view('guest.index',compact('apartments', 'latest_apartment'));
    }

    public function show(Apartment $apartment)
    {
        $apartment->load('city','user','photos','services');
        $randoms_apartments = Apartment::where('id','!=',$apartment->id)->paginate(4);
        return view('guest.show',compact('apartment','randoms_apartments'));
    }
}
