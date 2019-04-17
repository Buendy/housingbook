<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Category;
use App\City;
use App\Photo;
use App\Service;
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
        return view('profile.apartments.show',compact('apartment'));
    }

    public function create()
    {
        $cities = City::all();
        $services = Service::all();
        $categories = Category::all();
        return view('profile.apartments.create',compact('cities','services','categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request,Apartment::$rules);

        if(count($request->file('photos')) < 4)
        {
            return back();
        }

        $apartment = new Apartment();
        $request->merge(['city_id' => $request->city]);
        $apartment->fill($request->all());
        $apartment->user_id = auth()->user()->id;
        $apartment->save();

        foreach($request->file('photos') as $photo)
        {
            $filenameWithExt = $photo->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $photo->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            $path = $photo->storeAs('public/photos/', $filenameToStore);

            $photo = new Photo();
            $photo->url = $filenameToStore;
            $photo->local_url = $filenameToStore;
            $photo->apartment_id = $apartment->id;
            $photo->save();
        }

        foreach ($request->services as $service)
        {
            $apartment->services()->attach($service);
        }

        foreach($request->categories as $category)
        {
            $apartment->categories()->attach($category);
        }

        return back();
    }

    public function edit(Apartment $apartment)
    {
        $cities = City::all();
        $services = Service::all();
        $categories = Category::all();
        return view('profile.apartments.edit',compact('apartment','cities','services','categories'));
    }

    public function update(Request $request, Apartment $apartment)
    {
        $this->validate($request,Apartment::$rules);

        if(count($request->file('photos')) < 4)
        {
            return back();
        }

        $request->merge(['city_id' => $request->city]);
        $apartment->fill($request->all());
        $apartment->user_id = auth()->user()->id;
        $apartment->save();

        foreach($request->file('photos') as $photo)
        {
            $filenameWithExt = $photo->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $photo->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            $path = $photo->storeAs('public/photos/', $filenameToStore);

            $photo = new Photo();
            $photo->url = $filenameToStore;
            $photo->local_url = $filenameToStore;
            $photo->apartment_id = $apartment->id;
            $photo->save();
        }

        foreach ($request->services as $service)
        {
            $apartment->services()->attach($service);
        }

        foreach($request->categories as $category)
        {
            $apartment->categories()->attach($category);
        }

        return back();
    }

    public function destroy(Apartment $apartment)
    {
        $apartment->delete();

        return back()->with('success', __('profile.deletesuccess'));
    }
}
