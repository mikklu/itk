<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    // Uloskirjaustapahtuma
    public function logout()
    {
        Auth::logout();
        
        // Ohjaa sisäänkirjautumissivulle uloskirjauksen jälkeen
        return redirect()->route('login');
    }
}
