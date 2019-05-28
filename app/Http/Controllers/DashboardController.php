<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth','verified']);
    }

    public function index()
    {
        $totalEarnings = 0;

        $apartments = auth()->user()->apartments;

        foreach($apartments as $apartment)
        {
            $rents = $apartment->getMoneyGained();

            foreach ($rents as $rent){
                $totalEarnings += $rent->total;
            }
        }

        //Esto sería para sacar los gastos, no las ganancias
        /*$invoices = Auth()->user()->invoices;

        foreach ($invoices as $value){
            $totalEarnings += $value->pivot->total;
        }*/

        $user = auth()->user();

        $allDates = [];

        foreach($user->apartments as $apartment)
        {
            $dates = $apartment->getReservedDates();

            foreach ($dates as $date)
            {
                $date->last_name = $apartment->name;
                $allDates[] = $date;
            }
        }

        return view('dashboard.index', compact('totalEarnings','allDates'));
    }

    public function indexAjax()
    {
        $totalEarnings = 0;

        $apartments = auth()->user()->apartments;

        foreach($apartments as $apartment)
        {
            $rents = $apartment->getMoneyGained();

            foreach ($rents as $rent){
                $totalEarnings += $rent->total;
            }
        }

        //Esto sería para sacar los gastos, no las ganancias
        /*$invoices = Auth()->user()->invoices;

        foreach ($invoices as $value){
            $totalEarnings += $value->pivot->total;
        }*/

        $user = auth()->user();

        $allDates = [];

        foreach($user->apartments as $apartment)
        {
            $dates = $apartment->getReservedDates();

            foreach ($dates as $date)
            {
                $date->last_name = $apartment->name;
                $allDates[] = $date;
            }
        }

        $view = view("dashboard.indexAjax",compact('totalEarnings','allDates'))->render();

        return response()->json(['html'=>$view]);
    }
}
