@extends('layouts.app')

{{-- Käyttäjäasetukset-sivu --}}
@section('content')
<div class="container col-lg-5 py-3 mb-3 shadow rounded-bottom bg-white">

    {{-- Otsikko --}}
    <h2 class="pb-3">Vaihda salasana</h2>
    
    {{-- Huomautus salasanan vaihdon onnistumisesta --}}
    @if (session('status'))
        <div class="alert alert-primary" role="alert">{{ session('status') }}</div>
    @endif
    
            {{-- Lomake salasanan vaihtamiseksi --}}
            <form action="{{ route('change_password') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ auth()->user()->id }}">

                {{--1. rivi: nykyinen salasana --}}
                <div class="mb-3">
                    <label for="current_password" class="form-label">Nykyinen salasana</label>
                    <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" id="current_password"
                    value="{{ old('current_password') }}">
                    @error('current_password')
                        <div class="invalid-feedback">
                            {{  $message }}
                        </div>
                    @enderror
                </div>

                {{-- 2. rivi: uusi salasana --}}
                <div class="mb-3">
                    <label for="password" class="form-label"> Uusi salasana</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{  $message }}
                        </div>
                    @enderror
                </div>

                {{-- 3. rivi: uusi salasana uudestaan --}}
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Salasana uudestaan</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                    id="password_confirmation">
                </div>

                {{-- Tallenna-painike --}}
                <div>
                    <button class="btn btn-primary" type="submit">Tallenna</button>
                </div>

            </form>

    </div>
@endsection