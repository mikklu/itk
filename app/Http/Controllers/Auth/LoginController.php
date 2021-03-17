<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Estää tämän kontrollerin käytön muilta kuin kirjautumattomilta käyttäjiltä
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    // Sisäänkirjautumissivu
    public function index()
    {
        return view('auth.login');
    }

    // Sisäänkirjautumistapahtuma
    public function login(Request $request)
    {
        // Sisäänkirjautumistietojen validointi
        $this->validate($request,  [
            'username' => 'required',
            'password' => 'required',
        ]);

        // Sisäänkirjautumisyritys, Muista minut -toiminto ja virheilmoitus mikäli kirjautumistiedot virheelliset
        if (!Auth::attempt($request->only('username', 'password'), $request->remember)) {
            return back()->with([
                'status'=>'Virheellinen käyttäjätunnus tai salasana',
                'username'=> $request->username,
            ]);
        }

        // Onnistuneen kirjautumisen jälkeen ohjaa käyttäjän käyttäjäluokan mukaiselle aloitussivulle
        return redirect()->route('home');
    }
}