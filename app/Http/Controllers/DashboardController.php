<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $invoices = Auth()->user()->invoices;
        $totalEarnings = 0;

        foreach ($invoices as $value){
            $totalEarnings += $value->pivot->total;
        }

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

        return view('dashboard.index', compact('invoices', 'totalEarnings','allDates'));
    }
}
