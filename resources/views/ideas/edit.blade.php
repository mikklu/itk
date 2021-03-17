@extends('layouts.app')

{{-- Idean muokkaus -sivu --}}
@section('content')
    <div class="container col-lg-5 py-3 mb-3 shadow rounded-bottom bg-white">

        {{-- Otsikko --}}
        <h2 class="pb-3">Muokkaa ideaa</h2>

        {{-- Lomake idean muokkaamista varten --}}
        <form action="{{ route('edit_idea') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $idea->id }}">

            {{-- 1. rivi: nimi ja idean tyyppi --}}
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label for="name" class="form-label">Nimi</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    placeholder="Idean nimi" value="{{ old('name', $idea->name) }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{  $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="type_id" class="form-label">Tyyppi</label>
                    <select class="form-select" name="type_id" id="type_id" placeholder="Idean tyyppi"
                    value="{{ old('type', $idea->type_id) }}">
                        @foreach($types as $type)
                        <option value={{ $type->id }} {{ old('name', $idea->type_id) == $type->id ? 'selected' : '' }}>{{ $type->type }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- 2. rivi: selite --}}
            <div class="col-auto mb-3">
                <label for="description" class="form-label">Selite</label>
                <textarea class="form-control" placeholder="Selite"
                name="description" id="description" style="height: 135px">{{ old('description', $idea->description) }}</textarea>
            </div>

            {{-- 3. rivi: verkko-osoite --}}
            <div class="col-auto mb-3">
                <label for="url" class="form-label">Verkko-osoite</label>
                <input type="text" class="form-control" name="url" id="url"
                placeholder="Verkko-osoite" value="{{ old('url', $idea->url) }}">
            </div>

            {{-- 4. rivi: valintaruudut; tilaaja ja ohjaaja --}}
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label for="client_id" class="form-label">Tilaaja</label>
                    <select class="form-select" name="client_id" id="client_id" placeholder="Tilaaja">
                        <option value=""></option>
                        @foreach($clients as $client)
                            <option value={{ $client->id }} {{ old('client_id', $idea->client_id) == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="instructor_id" class="form-label">Ohjaaja</label>
                    <select class="form-select" name="instructor_id" id="instructor_id" placeholder="Ohjaaja">
                        <option value=""></option>
                        @foreach($instructors as $instructor)
                            <option value={{ $instructor->id }} {{ old('instructor_id', $idea->instructor_id) == $instructor->id ? 'selected' : '' }}>{{ $instructor->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- 5. rivi: toteutusvaihe ja kiireellisyys --}}
            <div class="row align-items-end">
                <div class="col-6 mb-3">
                    <label for="phase_id" class="form-label">Toteutusvaihe</label>
                    <select class="form-select" name="phase_id" id="phase_id" placeholder="Toteutusvaihe">
                        @foreach($phases as $phase)
                            <option value={{ $phase->id }} {{ old('phase_id', $idea->phase_id) == $phase->id ? 'selected' : '' }}>{{ $phase->phase }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto mb-3">
                    <div class="form-check mb-2">
                        <input type="hidden" name="is_urgent" value="0">
                        <input type="checkbox" class="form-check-input" name="is_urgent" id="is_urgent" value="1"
                        @if(old('is_urgent', $idea->is_urgent)) checked @endif>
                        <label class="form-check-label" for="is_urgent">Kiireellinen</label>
                    </div>
                </div>
            </div>

            {{-- 6. rivi: määräaika ja valmistumisaika --}}
            <div class="row">
                <div class="col-6 mb3">
                    <label for="deadline" class="form-label">Määräaika</label>
                    <input type="text" class="form-control" name="deadline" id="deadline" placeholder="Määräaika"
                    value="{{ old('deadline'), $idea->deadline }}">
                </div>
                <div class="col-6 mb-3">
                    <label for="completed" class="form-label">Valmistunut</label>
                    <input type="text" class="form-control" name="completed" id="completed" placeholder="Valmistunut" value="{{ old('completed'), $idea->completed }}">
                </div>
            </div>

            {{-- 7. rivi: Tallenna ja Takaisin-painikkeet --}}
            <div class="row">
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Tallenna</button>
                </div>
                <div class="col-auto">
                    <a class="btn btn-outline-primary" href="{{ route('idea') }}?id={{ $idea->id }}">Takaisin ideaan</a>
                </div>
            </div>

        </form>

        {{-- Tiimijäsenet --}}
        <div class="mb-4 pt-3 col-md-6">
            <h2 class="py-3">Tiimijäsenet</h2>

            {{-- Ehtolauseke: jos ei jäseniä, ei luoda taulukkoa --}}
            @if (count($memberships) == 0)
                <p>Ei tiimijäseniä.</p>
            @else
                <table id="memberships" class="table table-striped align-middle">
                    <thead>
                        <tr>
                        <th>Nimi</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($memberships as $member)
                        <tr>
                            <td><a href="{{ route('contact') }}?id={{ $member->contact_id }}">{{ $member->name }}</a></td>
                            <td class="col-1">
                                <form action={{ route('remove_member') }} method='post'>
                                    @csrf
                                    <button type='submit' class="btn btn-primary btn-sm" name='id' value={{ $member->id }}>Poista</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </div>

        {{-- Lisää uusi jäsen -lomake --}}
        <div class="mb-4 col-md-6">
            <h2 class="py-3">Lisää uusi jäsen</h2>
            <form action={{ route('add_member') }} method="post">
                @csrf
                <input type="hidden" name="idea_id" value="{{ $idea->id }}">
                <div class="col mb-3">
                    <select class="form-select" name="member_id" id="member_id" placeholder="Tiimijäsen">
                        @foreach ($contacts as $contact)
                        <option value={{ $contact->id }}>{{ $contact->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Lisää jäsen</button>
                </div>

            </form>
        </div>
        
    </div>
@endsection