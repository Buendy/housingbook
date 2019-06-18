<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Category;
use App\Service;
use Illuminate\Http\Request;
use League\Flysystem\Config;

class PublicController extends Controller
{
    public function index()
    {
        $apartments = Apartment::with('city','user','photos')->paginate(6);
        $latest_apartment = Apartment::orderBy('id', 'DESC')->take(3)->get();
        $categories = Category::all();
        $max = Apartment::max('price');
        $min = Apartment::min('price');
        $services = Service::all();

        return view('guest.index',compact('apartments', 'latest_apartment', 'categories', 'min', 'max','services'));
    }

    public function show(Apartment $apartment)
    {
        $apartment->load('city','user','photos','services');
        $randoms_apartments = Apartment::where('id','!=',$apartment->id)->where('city_id',$apartment->city_id)->paginate(4);

        $dates = $apartment->noAvailableDates();

        $allDates = [];

        foreach ($dates as $date)
        {
            $date_from = strtotime($date->entry);
            $date_to = strtotime($date->exit);

            for ($i=$date_from; $i<=$date_to; $i+=86400) {
                $allDates[] = config('app.locale') == 'es' ? date("d-m-Y", $i) : date("Y-m-d", $i);
            }
        }

        return view('guest.show',compact('apartment','randoms_apartments','allDates'));
    }

    public function welcome()
    {
        $categories = Category::all();
        return view('welcome', compact('categories'));
    }

    public function cities()
    {
        return view('guest.cities');
    }
}
