<?php

namespace App\Http\Controllers;

use App\Apartment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function store(Request $request, Apartment $apartment)
    {
        $date = new \DateTime($request->entrada);
        $date2 = new \DateTime($request->salida);

        $entrada = $date->format('Y-m-d');
        $salida = $date2->format('Y-m-d');

        $apartment->users()->attach(auth()->user()->id, ['entry' => $entrada, 'exit' => $salida]);

        return back();
    }
}
