<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Käyttäjien listaus
    public function index()
    {
        // Hakee käyttäjät tietokannasta
        $users = User::select('id', 'username')->get();

        return view('users.index', ['users' => $users]);
    }

    // Lisää käyttäjä -lomake
    public function add_user()
    {
        return view('users.add');
    }


    // Käyttäjän lisäys
    public function insert(Request $request)
    {
        // Tietojen validointi
        $this->validate($request,  [
            'username' => 'required|max:255|unique:users,username',
            'password' => 'required|confirmed',
        ]);

        // Uuden käyttäjän tallennus tietokantaan
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users');
    }
    
    // Käyttäjän poistaminen tietokannasta
    public function delete(Request $request)
    {
        // Käyttäjän poisto tietokannasta
        User::destroy($request->id);

        return back();
    }

    // Käyttäjäasetukset -sivu (tällä hetkellä vain salasanan vaihto)
    public function settings()
    {
        return view('users.settings');
    }

    public function change_password(Request $request)
    {
        // Tietojen validointi
        $this->validate($request, [
            'current_password' => 'required|password',
            'password' => 'required|confirmed'
        ]);

        // Salasanan tallennus tietokantaan
        User::where('id', $request->id)->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('status', 'Salasana vaihdettu onnistuneesti');

    }
}
