@extends('layouts.app')

{{-- Muokkaa yhteystietoa -sivu --}}
@section('content')
    <div class="container col-lg-5 py-3 mb-3 shadow rounded-bottom bg-white">

        {{-- Otsikko --}}
        <h2 class="pb-3">Muokkaa yhteystietoa</h2>

        {{-- Lomake yhteystiedon muokkaamista varten --}}
        <form action="{{ route('edit_contact') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $contact->id }}">

            {{-- 1. rivi: nimi ja yritys/taho --}}
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="name" class="form-label">Nimi</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    placeholder="Yhteystiedon nimi" value="{{ old('name', $contact->name) }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{  $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-6 mb-3">
                    <label for="company" class="form-label">Yritys</label>
                    <input type="text" class="form-control" name="company" id="company"
                    placeholder="Yritys tai muu taho" value="{{ old('company', $contact->company) }}">
                </div>
            </div>

            {{-- 2. rivi: puhelinnumero ja sähköpostiosoite --}}
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="phone" class="form-label">Puhelin</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Puhelinnumero"
                    value="{{ old('phone', $contact->phone) }}">
                </div>
                <div class="col-6 mb-3">
                    <label for="email" class="form-label">Sähköposti</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Sähköpostiosoite"
                    value="{{ old('email', $contact->email) }}">
                </div>
            </div>

            {{-- 3. rivi: ryhmätunnus ja valintaruudut; tilaaja ja ohjaaja --}}
            <div class="row align-items-end">
                <div class="col-6 mb-3">
                    <label for="group" class="form-label">Ryhmä</label>
                    <input type="text" class="form-control" name="group" id="group" placeholder="Ryhmätunnus"
                    value="{{ old('group', $contact->group) }}">
                </div>
                <div class="col-auto mb-3">
                    <div class="form-check mb-2">
                        <input type="hidden" name="is_client" value="0">
                        <input type="checkbox" class="form-check-input" name="is_client" id="is_client" value="1"
                        @if(old('is_client', $contact->is_client)) checked @endif >
                        <label class="form-check-label" for="is_client">Tilaaja</label>
                    </div>
                </div>
                <div class="col-auto mb-3">
                    <div class="form-check mb-2">
                        <input type="hidden" name="is_instructor" value="0">
                        <input type="checkbox" class="form-check-input" name="is_instructor" id="is_instructor" value="1"
                        @if(old('is_instructor', $contact->is_instructor)) checked @endif >
                        <label class="form-check-label" for="is_instructor">Ohjaaja</label>
                    </div>
                </div>
            </div>

            {{-- Tallenna- ja Takaisin-painikkeet --}}
            <div class="row">
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Tallenna</button>
                </div>
                <div class="col-auto">
                    <a class="btn btn-outline-primary" href="{{ route('contact') }}?id={{ $contact->id }}">Takaisin yhteystietoon</a>
                </div>
            </div>
            
        </form>
    </div>
@endsection