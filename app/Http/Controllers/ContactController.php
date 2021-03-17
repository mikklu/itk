<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Idea;
use App\Models\Membership;

class ContactController extends Controller
{
    public $timestamps = false;

    // Yhteystietolistaus
    public function index()
    {
        // Kysely kaikista yhteystiedoista
        $contacts = Contact::all();

        return view('contacts.index', ['contacts' => $contacts]);
    }

    // Yhden yhteystiedon tiedot sivulla
    public function show_contact(Request $request)
    {
        //Yhteystieto tilaajana
        $asClientIn = Idea::where('client_id', $request->id)->select('id', 'name')->get();

        // Yhteystieto ohjaajana
        $asInstructorIn = Idea::where('instructor_id', $request->id)->select('id', 'name')->get();

        // Yhteystieto tiimijäsenenä
        $asMemberIn = Membership::where('contact_id', $request->id)->addSelect([
            'name'=>Idea::select('name')->whereColumn('idea_id', 'id')
            ])->get();

        // Näytettävän yhteystiedon tiedot
        $contact = Contact::where('id', $request->id)->first();

        return view('contacts.contact', [
            'contact'=>$contact,
            'asClientIn'=>$asClientIn,
            'asInstructorIn'=>$asInstructorIn,
            'asMemberIn'=>$asMemberIn,
        ]);
    }

    // Lomakesivu yhteystiedon lisäämistä varten
    public function add_contact()
    {
        return view('contacts.add');
    }

    // Uuden yhteystiedon tallennus tietokantaan
    public function insert(Request $request)
    {

        // Tietojen validointi
        if ($request->email == null) {
            $this->validate($request, ['name' => 'required']);
        } else {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'email'
            ]);
        }

        // Tietojen vienti tietokantaan
        Contact::create([
            'name' => $request->name,
            'company' => $request->company,
            'phone' => $request->phone,
            'email' => $request->email,
            'group' => $request->group,
            'is_client' => $request->is_client,
            'is_instructor' => $request->is_instructor
        ]);

        // Tallennuksen jälkeen ohjaus takaisin yhteystietoihin
        return redirect()->route('contacts');
    }

    // Lomakesivu yhteystiedon muokkaamista varten
    public function edit_contact(Request $request)
    {
        // Muokattavan yhteystiedon tiedot
        $contact = Contact::where('id', $request->id)->first();

        return view('contacts.edit', ['contact'=>$contact]);
    }

    // Muokattujen tietojen vieminen tietokantaan
    public function alter(Request $request)
    {
        // Tietojen validointi
        if ($request->email == null) {
            $this->validate($request, ['name' => 'required']);
        } else {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'email'
            ]);
        }

        // Tietojen vienti tietokantaan
        Contact::where('id', $request->id)->update([
            'name' => $request->name,
            'company' => $request->company,
            'phone' => $request->phone,
            'email' => $request->email,
            'group' => $request->group,
            'is_client' => $request->is_client,
            'is_instructor' => $request->is_instructor
        ]);

        // Tallennuksen jälkeen ohjaus yhteystietoihin
        return redirect()->route('contacts');
    }

    // Yhteystiedon poistaminen tietokannasta
    public function delete(Request $request)
    {
        Contact::destroy($request->id);

        return back();
    }
}