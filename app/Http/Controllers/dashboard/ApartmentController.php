<?php

namespace App\Http\Controllers\dashboard;

use App\Apartment;
use App\Category;
use App\City;
use App\Helpers\Helper;
use App\Photo;
use App\Service;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApartmentController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth','verified']);
    }

    public function index(Request $request)
    {
        if($request->ajax()){

            $apartments = Apartment::where('user_id',auth()->user()->id)->paginate(6);

            $view = view('dashboard.apartment.index',compact('apartments'))->render();

            return response()->json(['html'=>$view]);

        } else {
            return back();
        }
    }

    public function show(Request $request,Apartment $apartment)
    {
        if($request->ajax()){

            $apartment->load('city','user','photos','services');
            $view = view('dashboard.apartment.show',compact('apartment'))->render();

            return response()->json(['html'=>$view]);

        } else {
            return back();
        }
    }

    public function create(Request $request)
    {
        if($request->ajax()){

            $cities = City::all();
            $services = Service::all();
            $categories = Category::all();
            $view = view('dashboard.apartment.create',compact('cities','services','categories'))->render();

            return response()->json(['html'=>$view]);

        } else {
            return back();
        }
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
        $apartment->category_id = $request->category;
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

        return back()->with('success', __('apartments.create'));
    }



    public function edit(Request $request,Apartment $apartment)
    {
        if($request->ajax()){

            if($apartment->user->id == auth()->user()->id) {

                $cities = City::all();
                $services = Service::all();
                $categories = Category::all();

                $apartmentServices = $apartment->services()->get();

                $view = view('dashboard.apartment.edit', compact('apartment', 'cities', 'services', 'categories','apartmentServices'))->render();

                return response()->json(['html'=>$view]);

            } else {
                return back();
            }
        } else {
            return back();
        }
    }

    public function update(Request $request, Apartment $apartment)
    {
        if($apartment->user->id == auth()->user()->id){

            $this->validate($request,[
                'name' => ['required','min:3',\Illuminate\Validation\Rule::unique('apartments','name')->ignore($apartment->id)],
                'description' => 'required | min:3 | max:300',
                'address' => 'required | min:10 | max:100',
                'short_description' => 'required | min:3 | max: 100',
                'city' => 'required | exists:cities,id',
                'services' => 'required',
                'category' => 'required',
                'price' => 'required']);

            /*if(count($request->file('photos')) < 4)
            {
                return back();
            }*/

            $request->merge(['city_id' => $request->city]);
            $apartment->fill($request->all());
            $apartment->user_id = auth()->user()->id;
            $apartment->save();

            if($request->file('photos') != null)
            {
                foreach($request->file('photos') as $photo)
                {
                    $picture = Helper::uploadFile($photo);

                    $photo = new Photo();
                    $photo->url = $picture;
                    $photo->local_url = $picture;
                    $photo->apartment_id = $apartment->id;
                    $photo->save();
                }
            }

            Helper::servicesTableFill($apartment, $request->services);

            $apartments = Apartment::where('user_id',auth()->user()->id)->paginate(6);
            return redirect(route('dashboard'))->with('success',__('profile.updatesuccess'));
        } else {
            return back();
        }
    }

    public function destroy(Apartment $apartment)
    {
        if($apartment->user->id == auth()->user()->id) {

            $apartment->delete();

            return redirect(route('dashboard'))->with('success', __('profile.deletesuccess'));
        } else {
            return back();
        }
    }

}
