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
        return $this->middleware(['auth','verified'])->except(['search','searchCategory','filter']);
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $max = Apartment::max('price');
        $min = Apartment::min('price');
        $apartments = [];
        $cities = City::where('name', 'LIKE', '%'.$request->search . '%')->get();
        $latest_apartment = Apartment::orderBy('id', 'DESC')->take(3)->get();

        $ids = [];

        if(count($cities))
        {
            foreach($cities as $city)
            {
                $ids[] = $city->id;
            }
        }
            $apartments = Apartment::with('city','user','photos','services')->whereIn('city_id',$ids)->get();

        return view('guest.index',compact('apartments','latest_apartment', 'categories', 'min', 'max'))->with('error', __('apartments.rent_error_disponibility'));
    }

    public function searchCategory($id)
    {
        $categories = Category::all();
        $max = Apartment::max('price');
        $min = Apartment::min('price');
        $latest_apartment = Apartment::orderBy('id', 'DESC')->take(3)->get();

        $category = Category::find($id);

        $apartments = $category->apartments()->get();
        return view('guest.index',compact('apartments','latest_apartment', 'categories', 'min', 'max'));
    }

    public function filter(Request $request)
    {
        $categories = Category::all();
        $max = Apartment::max('price');
        $min = Apartment::min('price');
        $latest_apartment = Apartment::orderBy('id', 'DESC')->take(3)->get();

        $ids = [];

        if($request->category != null)
        {
            foreach($request->category as $item)
            {
                $ids[] = $item;
            }
            $apartments = Apartment::where('price','<',$request->range)->whereIn('category_id',$ids)->get();
        } else {
            $apartments = Apartment::where('price','<',$request->range)->get();
        }

        return view('guest.index',compact('apartments','latest_apartment', 'categories', 'min', 'max'));
    }
}
