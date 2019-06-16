<?php

namespace App\Http\Controllers\dashboard;

use App\Apartment;
use App\Category;
use App\City;
use App\Helpers\Helper;
use App\Http\Requests\ApartmentRequest;
use App\Photo;
use App\Service;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ApartmentController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth','verified']);
    }

    public function index(Request $request)
    {
        if($request->ajax()){

            $apartments = Apartment::where('user_id',auth()->user()->id)->get();

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
        $cities = City::all();
        $services = Service::all();
        $categories = Category::all();
        return view('dashboard.apartment.create',compact('cities','services','categories'));
    }

    public function store(ApartmentRequest $request)
    {
        if($request->file('photos') != null){
            if(count($request->file('photos')) != 4){
                session()->flash('error', 'apartments.photos_bad');
                return back();
            }else{
                foreach($request->file('photos') as $photo){
                    if(Helper::validateFile($photo) == false){
                        session()->flash('error', 'apartments.photos_extension');
                        return back();
                    }
                }
            }

        }else{
            session()->flash('error', 'apartments.photos_bad');
            return back();
        }

        $apartment = new Apartment();

        $request->merge(['city_id' => $request->city]);
        $apartment->fill($request->all());
        $apartment->category_id = $request->category;
        $apartment->user_id = auth()->user()->id;
        $apartment->save();


        foreach($request->file('photos') as $photo){

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
        if($apartment->user->id == auth()->user()->id) {

            $cities = City::all();
            $services = Service::all();
            $categories = Category::all();

            $apartmentServices = $apartment->services()->get();

            return view('dashboard.apartment.edit', compact('apartment', 'cities', 'services', 'categories','apartmentServices'));

        } else {
            return back();
        }

    }

    public function update(ApartmentRequest $request, Apartment $apartment)
    {
        if($apartment->user->id == auth()->user()->id){

            if($request->file('photos') != null){
                if(count($request->file('photos')) != 4){
                    session()->flash('error', 'apartments.photos_bad');
                    return back();
                }else{
                    foreach($request->file('photos') as $photo){
                        if(Helper::validateFile($photo) == false){
                            session()->flash('error', 'apartments.photos_extension');
                            return back();
                        }
                    }
                }
            }

            $request->merge(['city_id' => $request->city]);
            $apartment->fill($request->all());
            $apartment->user_id = auth()->user()->id;
            $apartment->save();

            if($request->file('photos') != null){
                foreach($request->file('photos') as $photo){
                    $picture = Helper::uploadFile($photo);

                    $photo = new Photo();
                    $photo->url = $picture;
                    $photo->local_url = $picture;
                    $photo->apartment_id = $apartment->id;
                    $photo->save();
                }
            }

            Helper::servicesTableFill($apartment, $request->services);

            return back()->with('success', __('apartments.create'));
        } else {
            return back();
        }
    }

    public function destroy(ApartmentRequest $request)
    {
        $aparmentId = Apartment::find($request->idHolder);

        if($aparmentId->user->id == auth()->user()->id) {

            foreach ($aparmentId->photos as $photo){
                if (\File::exists(storage_path('app/public/photos/' . $photo->local_url))) {
                    \File::delete(storage_path('app/public/photos/' . $photo->local_url));
                }
            }

            $aparmentId->delete();

            return redirect(route('dashboard'))->with('success', __('profile.deletesuccess'));
        } else {
            return back();
        }
    }

    public function photodestroy(ApartmentRequest $request)
    {
        $aparmentId = Apartment::find($request->idHolder);

        if($aparmentId->user->id == auth()->user()->id) {

            foreach ($aparmentId->photos as $photo){
                if (\File::exists(storage_path('app/public/photos/' . $photo->local_url))) {
                    \File::delete(storage_path('app/public/photos/' . $photo->local_url));
                }
                $photo->delete();
            }

            return back()->with('success', __('profile.deletephotosuccess'));
        } else {
            return back()->with('error', __('profile.deleteapartment'));
        }
    }

}
