<?php

namespace App\Http\Controllers;

use App\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function show(Apartment $apartment)
    {
        $apartment->load('city','user','photos','services');
        $randoms_apartments = Apartment::where('id','!=',$apartment->id)->paginate(4);
        return view('profile.apartments.show',compact('apartment','randoms_apartments'));
    }

    public function create()
    {
        return view('profile.apartments.create');
    }

    public function store(Request $request)
    {

    }

    public function edit(Apartment $apartment)
    {
        return view('profile.apartments.edit',compact('apartment'));

    }

    public function update(Request $request, Apartment $apartment)
    {
        dd($apartment);
    }

    public function destroy(Apartment $apartment)
    {
        //$apartment->delete();

        return back()->with('success', __('profile.deletesuccess'));
    }
}
