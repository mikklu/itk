<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membership;

class MembershipController extends Controller
{
    public $timestamps = false;

    // Tiimijäsenyyden lisääminen
    public function insert(Request $request)
    {
        // Jäsenyyden lisääminen tietokantaan
        Membership::create([
            'contact_id' => $request->member_id,
            'idea_id' => $request->idea_id
        ]);

        return back();
    }

    // Tiimijäsenyyden poistaminen
    public function delete(Request $request)
    {
        //Poisto tietokannasta
        Membership::destroy(($request->id));

        return back();
    }

}
