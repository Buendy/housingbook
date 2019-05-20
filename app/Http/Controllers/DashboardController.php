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

        return view('dashboard.index', compact('invoices', 'totalEarnings'));
    }
}
