<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\NotifyMailable;
use Illuminate\Support\Facades\Mail;

class NotifyController extends Controller
{
    //
    public function index(){
    }

    public function store(){
        $email = new NotifyMailable;
        Mail::to('pedro99slip@gmail.com')->send($email);
        return "Correo Enviado";
    }
}
