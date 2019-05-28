<?php

namespace App\Http\Controllers\dashboard;

use App\Apartment;
use Barryvdh\DomPDF\Facade;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Date;

class InvoiceController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth','verified']);
    }

    public function index(Request $request)
    {
        if($request->ajax()){

            $apartments = Auth()->user()->invoices;

            $view =  view('dashboard.invoices.index', compact('apartments'))->render();

            return response()->json(['html'=>$view]);

        } else {
            return back();
        }
    }

    public function invoices(Request $request)
    {
        if($request->ajax()){
            $apartments = Auth()->user()->invoices;

            $view = view('dashboard.invoices.invoices', compact('apartments'))->render();

            return response()->json(['html'=>$view]);

        } else {
            return back();
        }
    }

    public function download(Request $request)
    {
        $invoice = Auth()->user()->invoice($request->id, Auth()->user()->id)->first();

        $entry = new \DateTime($invoice->pivot->entry);
        $exit = new \DateTime($invoice->pivot->exit);
        $days = $entry->diff($exit)->format('%a');


        $pdf = App::make('dompdf.wrapper');
        $pdf = Facade::loadView('pdf.invoice', compact('invoice', 'days'));
        return $pdf->download('invoice-'. $invoice->pivot->entry .''. $invoice->pivot->exit .'.pdf');
    }

}
