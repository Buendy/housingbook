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
        $services = Service::all();

        $ids = [];

        if(count($cities))
        {
            foreach($cities as $city)
            {
                $ids[] = $city->id;
            }
        }
            $apartments = Apartment::with('city','user','photos','services')->whereIn('city_id',$ids)->get();

        return view('guest.index',compact('apartments','latest_apartment', 'categories', 'min', 'max','services'));
    }

    public function searchCategory($id)
    {
        $categories = Category::all();
        $max = Apartment::max('price');
        $min = Apartment::min('price');
        $latest_apartment = Apartment::orderBy('id', 'DESC')->take(3)->get();
        $services = Service::all();

        $category = Category::find($id);

        $apartments = $category->apartments()->get();
        return view('guest.index',compact('apartments','latest_apartment', 'categories', 'min', 'max','services'));
    }

    public function filter(Request $request)
    {
        $categories = Category::all();
        $max = Apartment::max('price');
        $min = Apartment::min('price');
        $latest_apartment = Apartment::orderBy('id', 'DESC')->take(3)->get();
        $services = Service::all();

        $ids = [];
        $ids2 = [];
        $apartments = [];

        if($request->category != null && $request->service !=null)
        {
            foreach($request->category as $item)
            {
                $ids[] = $item;
            }

            foreach($request->service as $item2)
            {
                $ids2[] = $item2;
            }

            $apartments = Apartment::where('price','<',$request->range)->whereIn('category_id',$ids)->get();

            $apartmentsServices = [];

            foreach($apartments as $apartment)
            {
                /*if($apartment->services()->wherePivotIn('service_id',$ids2)->exists())
                    $apartmentsServices[] = $apartment;*/
                $servicesApartment = $apartment->services()->get();

                $contador = 0;

                foreach($servicesApartment as $item)
                {
                    if(in_array($item->id,$ids2))
                        $contador++;
                }

                if($contador == count($ids2))
                    $apartmentsServices[] = $apartment;
            }

            $apartments = $apartmentsServices;
        }

        if($request->category != null && $request->service == null)
        {
            foreach($request->category as $item)
            {
                $ids[] = $item;
            }
            $apartments = Apartment::where('price','<',$request->range)->whereIn('category_id',$ids)->get();
        }

        if($request->category == null && $request->service != null)
        {
            foreach($request->service as $item)
            {
                $ids[] = $item;
            }
            $apartments = Apartment::where('price','<',$request->range)->get();

            $apartmentsServices = [];

            foreach($apartments as $apartment)
            {
                /*if($apartment->services()->wherePivotIn('service_id',$ids2)->exists())
                    $apartmentsServices[] = $apartment;*/
                $servicesApartment = $apartment->services()->get();

                $contador = 0;

                foreach($servicesApartment as $item)
                {
                    if(in_array($item->id,$ids))
                        $contador++;
                }

                if($contador == count($ids))
                    $apartmentsServices[] = $apartment;
            }

            $apartments = $apartmentsServices;
        }

        if($request->category == null && $request->service == null)
        {
            $apartments = Apartment::where('price','<',$request->range)->get();
        }

        return view('guest.index',compact('apartments','latest_apartment', 'categories', 'min', 'max','services'));
    }
}
