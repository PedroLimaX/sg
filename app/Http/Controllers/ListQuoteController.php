<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\ListQuoteMailable;
use Illuminate\Support\Facades\Mail;

class ListQuoteController extends Controller
{
    //
    public function index(){

        return view('emails.listquoteform');
        
    }
    public function store(Request $request){
        $request->validate([
            'name' =>'required',
            'email' => 'required|email',
            'details' =>'required'
        ]);
        $email = new ListQuoteMailable($request->all());
        Mail::to('support@sgiluminacion.com')->send($email);
        return redirect()->route('listquote.index')
            ->with('success', 'Cotizacion enviada correctamente.');
    }
}
