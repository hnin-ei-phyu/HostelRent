<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Invoice;
use Notification;
use App\Notifications\InvoicePaidNotification;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::where('user_id', auth()->user()->id)->get();
 
        return view('home', compact('invoices'));
    }
 
    public function show(Invoice $invoice)
    {
        return view('home', compact('invoice'));
    }
     
    public function sendInvoicePaidNotification(Request $request) 
    {   
        $request->validate([
            'invoice_id'=>'required|exists:invoices,id',
        ]);
 
        $user = auth()->user();
 
        $invoice = Invoice::find($request->invoice_id)->first();
 
        $invoice['buttonText'] = 'View Invoice';
        $invoice['invoiceUrl'] = route('show.invoice');
        $invoice['thanks'] = 'Your thank you message';
   
        Notification::send($user, new InvoicePaidNotification($invoice));
    
        return back()->with('You have successfully paid the invoice');
    }
}
