@extends('layouts.app')

{{-- Lisää uusi idea -sivu --}}
@section('content')
    <div class="container col-lg-5 py-3 mb-3 shadow rounded-bottom bg-white">

        {{-- Otsikko --}}
        <h2 class="pb-3">Lisää uusi idea</h2>

        {{-- Lomake idean lisäämistä varten --}}
        <form action="{{ route('add_idea') }}" method="post">
            @csrf

            {{-- 1. rivi: nimi ja idean tyyppi --}}
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label for="name" class="form-label">Nimi</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    placeholder="Idean nimi" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{  $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="type_id" class="form-label">Tyyppi</label>
                    <select class="form-select" name="type_id" id="type_id" placeholder="Idean tyyppi"
                    value="{{ old('type') }}">
                        @foreach($types as $type)
                        <option value={{ $type->id }}>{{ $type->type }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- 2. rivi: selite --}}
            <div class="col-auto mb-3">
                <label for="description" class="form-label">Selite</label>
                <textarea class="form-control" placeholder="Selite"
                name="description" id="description" style="height: 100px">{{ old('description') }}</textarea>
            </div>

            {{-- 3. rivi: verkko-osoite --}}
            <div class="col-auto mb-3">
                <label for="url" class="form-label">Verkko-osoite</label>
                <input type="text" class="form-control" name="url" id="url"
                placeholder="Verkko-osoite" value="{{ old('url') }}">
            </div>

            {{-- 4. rivi: valintaruudut; tilaaja ja ohjaaja --}}
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label for="client_id" class="form-label">Tilaaja</label>
                    <select class="form-select" name="client_id" id="client_id" placeholder="Tilaaja"
                    value="{{ old('client_id') }}">
                        <option value=""></option>
                        @foreach($clients as $client)
                        <option value={{ $client->id }}>{{ $client->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="instructor_id" class="form-label">Ohjaaja</label>
                    <select class="form-select" name="instructor_id" id="instructor_id" placeholder="Ohjaaja"
                    value="{{ old('instructor_id') }}">
                        <option value=""></option>
                        @foreach($instructors as $instructor)
                        <option value={{ $instructor->id }}>{{ $instructor->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- 5. rivi: toteutusvaihe ja kiireellisyys --}}
            <div class="row align-items-end">
                <div class="col-6 mb-3">
                    <label for="phase_id" class="form-label">Toteutusvaihe</label>
                    <select class="form-select" name="phase_id" id="phase_id" placeholder="Toteutusvaihe"
                    value="{{ old('phase_id') }}">
                        @foreach($phases as $phase)
                            <option value={{ $phase->id }}>{{ $phase->phase }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto mb-3">
                    <div class="form-check mb-2">
                        <input type="hidden" name="is_urgent" value="0">
                        <input type="checkbox" class="form-check-input" name="is_urgent" id="is_urgent" value="1"
                        @if(old('is_urgent')) checked @endif >
                        <label class="form-check-label" for="is_urgent">Kiireellinen</label>
                    </div>
                </div>
            </div>

            {{-- 6. rivi: määräaika ja valmistumisaika --}}
            <div class="row">
                <div class="col-6 mb3">
                    <label for="deadline" class="form-label">Määräaika</label>
                    <input type="text" class="form-control" name="deadline" id="deadline" placeholder="Määräaika"
                    value="{{ old('deadline') }}">
                </div>
                <div class="col-6 mb-3">
                    <label for="completed" class="form-label">Valmistunut</label>
                    <input type="text" class="form-control" name="completed" id="completed" placeholder="Valmistunut"
                    value="{{ old('completed') }}">
                </div>
            </div>

            {{-- 7. rivi: Tallenna- ja Takaisin-painikkeet --}}
            <div class="row">
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Tallenna</button>
                </div>
                <div class="col-auto">
                    <a class="btn btn-outline-primary" href="{{ route('ideas') }}">Takaisin ideoihin</a>
                </div>
            </div>
            
        </form>
    </div>
@endsection