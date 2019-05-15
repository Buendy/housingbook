<?php

namespace App\Http\Controllers\dashboard;

use App\Apartment;
use App\Category;
use App\City;
use App\Helpers\Helper;
use App\Photo;
use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApartmentController extends Controller
{
    public function index()
    {
        $apartments = Apartment::where('user_id',auth()->user()->id)->paginate(6);

        return view('dashboard.apartment.index',compact('apartments'));
    }

    public function show(Apartment $apartment)
    {

        $apartment->load('city','user','photos','services');
        return view('dashboard.apartment.show',compact('apartment'));
    }

    public function create()
    {
        $cities = City::all();
        $services = Service::all();
        $categories = Category::all();
        return view('dashboard.apartment.create',compact('cities','services','categories'));
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
        return view('dashboard.apartment.edit',compact('apartment','cities','services','categories'));
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

       // dd($apartment);

        Helper::servicesTableFill($apartment, $request->services);

        Helper::categoriesTableFill($apartment, $request->categories);
        $apartments = Apartment::where('user_id',auth()->user()->id)->paginate(6);
        return view('dashboard.apartment.index', compact('apartments'))->with('success', 'Apartamento creado con exitogi');
    }

    public function destroy(Apartment $apartment)
    {
        $apartment->delete();

        return back()->with('success', __('profile.deletesuccess'));
    }

}
