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
        $categories = Category::all();
        $max = Apartment::max('price');
        $min = Apartment::min('price');
        $city = City::where('name', 'LIKE', $request->search)->get();
        $latest_apartment = Apartment::orderBy('id', 'DESC')->take(3)->get();


        if($city->count()){
            $apartments = Apartment::with('city','user','photos','services')->where('city_id','=',$city[0]->id)->paginate(6);
            return view('guest.index',compact('apartments','latest_apartment', 'categories', 'min', 'max'));

        }else{

            $apartments = Apartment::with('city','user','photos','services')->paginate(6);
            return view('guest.index',compact('apartments','latest_apartment', 'categories', 'min', 'max'))->with('error', __('apartments.rent_error_disponibility'));

        }


        $latest_apartment = Apartment::latest()->take(3)->get();

    }

    public function searchCategory($id)
    {
        $categories = Category::all();
        $max = Apartment::max('price');
        $min = Apartment::min('price');
        $latest_apartment = Apartment::orderBy('id', 'DESC')->take(3)->get();

        $category = Category::find($id);

        $apartments = $category->apartments()->paginate(6);
        return view('guest.index',compact('apartments','latest_apartment', 'categories', 'min', 'max'));
    }
}
