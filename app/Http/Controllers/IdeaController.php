<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use App\Models\Type;
use App\Models\Contact;
use App\Models\Membership;
use App\Models\Phase;
use Illuminate\Support\Facades\Auth;

class IdeaController extends Controller
{
    // Ohjaa kirjautuneen ja kirjautumattoman käyttäjän ideoihin
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->is_admin){

                // Estää käytön adminilta
                return abort(403);

            } else {        

                // Kirjautunut käyttäjä
                // Kysely kaikista ideoista
                // Alikyselyinä tyyppien, tilaajien ja ohjaajien nimet
                $ideas = Idea::addSelect([
                    'type'=>Type::select('type')->whereColumn('type_id', 'id'),
                    'client'=>Contact::select('name')->whereColumn('client_id', 'id'),
                    'instructor'=>Contact::select('name')->whereColumn('instructor_id', 'id'),
                    'phase'=>Phase::select('phase')->whereColumn('phase_id', 'id')
                    ])->get();

                return view('ideas.index', ['ideas' => $ideas]);

            }
        } else {

            // Kirjautumaton käyttäjä
            // Kysely kaikista ideoista
            // Alikyselyinä tyyppien ja ohjaajien nimet
            $ideas = Idea::select('name', 'is_urgent', 'deadline')->addSelect([
                'type'=>Type::select('type')->whereColumn('type_id', 'id'),
                'instructor'=>Contact::select('name')->whereColumn('instructor_id', 'id'),
                'phase'=>Phase::select('phase')->whereColumn('phase_id', 'id')
                ])->get();

            return view('ideas.index-unauth', ['ideas' => $ideas]);
        }
    }

    // Yhden idean tiedot sivulla
    public function show_idea(Request $request)
    {
        // Idean tiimijäsenyydet
        $memberships = Membership::where('idea_id', $request->id)->addSelect([
            'name'=>Contact::select('name')->whereColumn('contact_id', 'id')
            ])->orderBy('name', 'asc')->get();

        // Näytettävän idean tiedot
        $idea = Idea::where('id', $request->id)->addSelect([
            'type'=>Type::select('type')->whereColumn('type_id', 'id'),
            'client'=>Contact::select('name')->whereColumn('client_id', 'id'),
            'instructor'=>Contact::select('name')->whereColumn('instructor_id', 'id'),
            'phase'=>Phase::select('phase')->whereColumn('phase_id', 'id')
            ])->first();

        return view('ideas.idea', [
            'idea'=>$idea,
            'memberships'=>$memberships
            ]);
    }

    // Lomakesivu idean lisäämistä varten
    public function add_idea()
    {
        // Idean lisäys -lomaketta varten kyselyt ideatyypeistä, toteutusvaiheista, tilaajista ja ohjaajista
        $types = Type::all();
        $phases = Phase::all();
        $clients = Contact::select('id', 'name')->where('is_client', 1)->get();
        $instructors = Contact::select('id', 'name')->where('is_instructor', 1)->get();

        return view('ideas.add', ['types'=>$types, 'phases'=>$phases, 'clients'=>$clients, 'instructors'=>$instructors]);
    }

    // Idean lisääminen tietokantaan
    public function insert(Request $request)
    {
        // Idean lisäys -lomakkeen tietojen validointi
        $this->validate($request, [
            'name' => 'required|max:255|unique:ideas,name',
            'type_id' => 'required',
            'phase_id' => 'required'
        ]);

        // Lomakkeen tietojen tallennus tietokantaan
        Idea::create([
            'name' => $request->name,
            'type_id' => $request->type_id,
            'description' => $request->description,
            'url' => $request->url,
            'client_id' => $request->client_id,
            'instructor_id' => $request->instructor_id,
            'is_urgent' => $request->is_urgent,
            'phase_id' => $request->phase_id,
            'deadline' => $request->deadline,
            'completed' => $request->completed,
        ]);

        return redirect()->route('ideas');
    }

    // Lomakesivu idean muokkaamista varten
    public function edit_idea(Request $request)
    {
        // Lomaketta varten kyselyt ideatyypeistä, tilaajista ja ohjaajista
        $types = Type::all();
        $phases = Phase::all();
        $clients = Contact::select('id', 'name')->where('is_client', 1)->orderBy('name', 'asc')->get();
        $instructors = Contact::select('id', 'name')->where('is_instructor', 1)->orderBy('name', 'asc')->get();

        // Kyselyt tiimijäsenyyksiä ja valitsinta varten
        $memberships = Membership::where('idea_id', $request->id)->addSelect([
            'name'=>Contact::select('name')->whereColumn('contact_id', 'id')
            ])->orderBy('name', 'asc')->get();
        $contacts = Contact::select('id', 'name')->whereNotIn('id', Membership::where('idea_id', $request->id)->select('contact_id'))
        ->orderBy('name', 'asc')->get();

        // Muokattavan idean tiedot
        $idea = Idea::where('id', $request->id)->first();

        return view('ideas.edit', [
            'idea'=>$idea,
            'types'=>$types,
            'phases'=>$phases,
            'clients'=>$clients,
            'instructors'=>$instructors,
            'memberships'=>$memberships,
            'contacts'=>$contacts
            ]);
    }

    // Muokattujen tietojen syöttäminen tietokantaan
    public function alter(Request $request)
    {
        // Tietojen validointi
        $this->validate($request, [
            'name' => 'required',
            'type_id' => 'required',
            'phase_id' => 'required'
        ]);

        //Muokattujen tietojen tallennus tietokantaan
        Idea::where('id', $request->id)->update([
            'name' => $request->name,
            'type_id' => $request->type_id,
            'description' => $request->description,
            'url' => $request->url,
            'client_id' => $request->client_id,
            'instructor_id' => $request->instructor_id,
            'is_urgent' => $request->is_urgent,
            'phase_id' => $request->phase_id,
            'deadline' => $request->deadline,
            'completed' => $request->completed,
        ]);

        return redirect()->route('ideas');
    }

    // Idean poistaminen tietokannasta
    public function delete(Request $request)
    {
        Idea::destroy($request->id);

        return back();
    }

}