@extends('layouts.app')

{{-- Yhteystiedon yksityiskohtaiset tiedot -sivu --}}
@section('content')
    <div class="container col-lg-5 py-3 mb-3 shadow rounded-bottom bg-white">

        {{-- Yhteystiedon nimi ja yritys/taho otsikkona --}}
        <div class="pb-3">
            <h2>{{ $contact->name }}</h2>
            <h5>{{ $contact->company }}</h5>
        </div>

        {{-- 1. rivi: puhelinnumero ja sähköpostiosoite --}}
        <div class="row">
            <div class="col-6 mb-3">
                <label for="phone" class="form-label">Puhelinnumero</label>
                @if(isset($contact->phone))
                    <p class="form-control" name="phone">{{ $contact->phone }}</p>
                @else
                    <pre class="form-control" name="phone"> </pre>
                @endif
            </div>
            <div class="col-6 mb-3">
                <label for="email" class="form-label">Sähköpostiosoite</label>
                @if(isset($contact->email))
                    <p class="form-control" name="email">{{ $contact->email }}</p>
                @else
                    <pre class="form-control" name="email"> </pre>
                @endif
            </div>
        </div>

        {{-- 2. rivi: ryhmätunnus sekä tilaaja- ja ohjaajatiedot --}}
        <div class="row align-items-end">
            <div class="col-6 mb-3">
                <label for="group" class="form-label">Ryhmä</label>
                @if(isset($contact->group))
                    <p class="form-control" name="group">{{ $contact->group }}</p>
                @else
                    <pre class="form-control" name="group"> </pre>
                @endif
            </div>
            <div class="col-auto mb-3">
                <div class="form-check mb-4">
                    <input type="checkbox" class="form-check-input" name="is_client"  style="pointer-events: none" @if($contact->is_client) checked @endif>
                    <label class="form-check-label" for="is_client">Tilaaja</label>
                </div>
            </div>
            <div class="col-auto mb-3">
                <div class="form-check mb-4" style="padding-top:2.1em">
                    <input type="checkbox" class="form-check-input" name="is_instructor"
                    style="pointer-events: none" @if($contact->is_instructor) checked @endif>
                    <label class="form-check-label" for="is_instructor">Ohjaaja</label>
                </div>
            </div>
        </div>

        {{-- Muokkaus- ja Takaisin-painikkeet --}}
        <div class="row">
            <div class="col-auto">
                <form action={{ route('edit_contact') }} method='get'>
                    <button type='submit' class="btn btn-primary" name='id' value={{ $contact->id }}>Muokkaa</button>
                </form>
            </div>
            <div class="col-auto">
                <a class="btn btn-outline-primary" href="{{ route('contacts') }}">Takaisin yhteystietoihin</a>
            </div>
        </div>

        {{-- Tilaajana --}}
        {{-- Ehtolauseke: jos tilaajana, listataan ideat --}}
        @if (count($asClientIn) != 0)
            <div class="mb-4 pt-3 col-md-6">
                <h2 class="py-3">Tilaajana</h2>
                    <table id="memberships" class="table table-striped align-middle">
                        <thead>
                            <tr>
                            <th>Idea</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($asClientIn as $idea)
                            <tr>
                                <td><a href="{{ route('idea') }}?id={{ $idea->id }}">{{ $idea->name }}</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        @endif

        {{-- Ohjaajana --}}
        {{-- Ehtolauseke: jos ohjaajana, listataan ideat --}}
        @if (count($asInstructorIn) != 0)
            <div class="mb-4 pt-3 col-md-6">
                <h2 class="py-3">Ohjaajana</h2>
                    <table id="memberships" class="table table-striped align-middle">
                        <thead>
                            <tr>
                            <th>Idea</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($asInstructorIn as $idea)
                            <tr>
                                <td><a href="{{ route('idea') }}?id={{ $idea->id }}">{{ $idea->name }}</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        @endif

        {{-- Tiimijäsenenä --}}
        {{-- Ehtolauseke: jos tiimijäsenenä, listataan ideat --}}
        @if (count($asMemberIn) != 0)
            <div class="mb-4 pt-3 col-md-6">
                <h2 class="py-3">Tiimijäsenenä</h2>
                    <table id="memberships" class="table table-striped align-middle">
                        <thead>
                            <tr>
                            <th>Idea</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($asMemberIn as $idea)
                            <tr>
                                <td><a href="{{ route('idea') }}?id={{ $idea->idea_id }}">{{ $idea->name }}</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        @endif
        
    </div>
@endsection