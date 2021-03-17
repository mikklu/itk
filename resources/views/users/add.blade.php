@extends('layouts.app')

{{-- Lisää uusi käyttäjä -sivu --}}
@section('content')
<div class="container col-lg-5 py-3 mb-3 shadow rounded-bottom bg-white">

    {{-- Otsikko --}}
    <h2 class="pb-3">Lisää käyttäjä</h2>

            {{-- Lomake käyttäjän lisäämistä varten --}}
            <form action="{{ route('add_user') }}" method="post">
                @csrf

                {{-- 1. rivi: käyttäjänimi --}}
                <div class="mb-3">
                    <label for="username" class="form-label">Käyttäjänimi</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username"
                    placeholder="Käyttäjänimi" value="{{ old('username') }}">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- 2. rivi: salasana --}}
                <div class="mb-3">
                    <label for="password" class="form-label">Salasana</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password"
                    placeholder="Salasana" value="{{ old('password') }}">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- 3. rivi: salasana uudestaan --}}
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Salasana uudestaan</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation"
                    placeholder="Salasana uudestaan" value="{{ old('password') }}">
                    @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Tallenna- ja Takaisin-painikkeet --}}
                <div class="row">
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Tallenna</button>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-outline-primary" href="{{ route('users') }}">Takaisin käyttäjiin</a>
                    </div>
                </div>

            </form>

    </div>
@endsection