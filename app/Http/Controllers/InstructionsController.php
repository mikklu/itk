<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class InstructionsController extends Controller
{
    // Ohjaa käyttäjän adminin, kirjautuneen tai kirjautumattoman käyttäjän ohjeisiin
    public function index()
    {
            if (Auth::check()) {
                if (Auth::user()->is_admin){
                    return view('instructions.instructions-admin');
                } else {
                    return view('instructions.instructions-auth');
                }
            } else {
                return view('instructions.instructions-unauth');
            }
    }

}
