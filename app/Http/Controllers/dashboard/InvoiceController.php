<?php

namespace App\Http\Controllers\dashboard;

use App\Apartment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Auth()->user()->invoices;

        dd($invoices);
        return view('dashboard.invoices.index', compact('invoices'));
    }

    public function History()
    {
        $apartments = Auth()->user()->invoices;


        return view('dashboard.invoices.history', compact('apartments'));
    }

}
