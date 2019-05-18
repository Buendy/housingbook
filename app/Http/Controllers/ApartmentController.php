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
