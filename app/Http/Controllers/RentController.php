<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Mail\NewRent;
use App\Mail\SuccessfullyRent;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RentController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function validation(Request $request, Apartment $apartment)
    {
        $date = new \DateTime($request->entrada);
        $date2 = new \DateTime($request->salida);

        $days = $date->diff($date2)->format('%a');


        $entrada = $date->format('Y-m-d');
        $salida = $date2->format('Y-m-d');

        $entradaCheck = Carbon::parse($entrada);
        $salidaCheck = Carbon::parse($salida);

        if($entradaCheck > $salidaCheck || $days == 0){
            return back()->with('error', __('apartments.rent_error'));
        }

        $checkDisponibility = $apartment->checkDisponibility($entrada,$salida);

        if($checkDisponibility->count()){
            return back()->with('error', __('apartments.rent_error_disponibility'));
        }else{
            session([
                'entradaEstancia' => $entrada,
                'salidaEstancia' => $salida,
                'apartmentReservado' => $apartment,
                'UserReservado' => auth()->user()->id,
                'days' => $days,
                ]);

            return view('paypal.demo', compact('apartment', 'entrada', 'salida', 'days'));
        }

    }

    public function confirm()
    {
        return view('paypal.demo');
    }


    public function store(Apartment $apartment)
    {

        $apartmentSession = session('apartmentReservado');
        $entrada = session('entradaEstancia');
        $salida = session('salidaEstancia');
        $price = session('days') * $apartment->price;


        if($apartment->id != $apartmentSession->id)
        {
            session(['error' => 'Unknown error occurred']);
            return redirect('public/apartments');

        }else{


            $apartment->users()->attach(auth()->user()->id, ['entry' => $entrada, 'exit' => $salida, 'total' => $price], "asdada");

            //Email para dueño
            $owner = User::where('id', $apartment->user_id)->first();

            Mail::to($owner)->send(new NewRent(auth()->user(), $apartment));


            //Email para persona que alquila
            $user = auth()->user();
            Mail::to($user)->send(new SuccessfullyRent(auth()->user(), $apartment));


            //Telegram para dueño y persona que alquila
            TelegramController::sendTelegrams(auth()->user()->telegram,$owner->telegram,$apartment);

            session()->forget('apartmentReservado');


            return redirect('public/apartments')->with('success', __('apartments.rent_success'));

        }



    }
}
