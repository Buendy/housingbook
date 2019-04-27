<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Category;
use App\City;
use App\Helpers\Helper;
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
            $picture = Helper::uploadFile($photo);

            $photo = new Photo();
            $photo->url = $picture;
            $photo->local_url = $picture;
            $photo->apartment_id = $apartment->id;
            $photo->save();
        }

        Helper::servicesTableFill($apartment,$request->services);
        Helper::categoriesTableFill($apartment,$request->categories);

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
            $picture = Helper::uploadFile($photo);

            $photo = new Photo();
            $photo->url = $picture;
            $photo->local_url = $picture;
            $photo->apartment_id = $apartment->id;
            $photo->save();
        }

        Helper::servicesTableFill($apartment,$request->services);
        Helper::categoriesTableFill($apartment,$request->categories);

        return back('success', 'Apartamento creado con exitogi');
    }

    public function destroy(Apartment $apartment)
    {
        $apartment->delete();

        return back()->with('success', __('profile.deletesuccess'));
    }

    public function search(Request $request)
    {
        $apartments = Apartment::with('city','user','photos','services')->where('name','LIKE',$request->search)->paginate(6);

        $latest_apartment = Apartment::latest()->take(3)->get();
        return view('guest.index',compact('apartments','latest_apartment'));
    }
}
