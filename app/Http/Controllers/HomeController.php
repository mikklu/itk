<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    //Ohjaa kirjautumattoman, kirjautuneen ja adminin eri kotisivulle
    public function index()
    {
            if (Auth::check()) {
                if (Auth::user()->is_admin){
                    return redirect()->action([UserController::class, 'index']);
                } else {
                    return redirect()->action([IdeaController::class, 'index']);
                }
            } else {
                return view('auth.login');
            }
    }
}
