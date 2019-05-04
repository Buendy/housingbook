<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $apartments = Apartment::with('city','user','photos')->paginate(6);
        $latest_apartment = Apartment::orderBy('id', 'DESC')->take(3)->get();
        $categories = Category::all();
        $max = Apartment::max('price');
        $min = Apartment::min('price');

        return view('guest.index',compact('apartments', 'latest_apartment', 'categories', 'min', 'max'));
    }

    public function show(Apartment $apartment)
    {
        $apartment->load('city','user','photos','services');
        $randoms_apartments = Apartment::where('id','!=',$apartment->id)->where('city_id',$apartment->city_id)->paginate(4);
        return view('guest.show',compact('apartment','randoms_apartments'));
    }
}
