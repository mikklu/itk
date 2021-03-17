@extends('layouts.app')

{{-- Idean yksityiskohtaiset tiedot -sivu --}}
@section('content')
    <div class="container col-lg-5 py-3 mb-3 shadow rounded-bottom bg-white">

    {{-- Tiedot lomakkeenomaisessa muodossa (ei muokattavissa) --}}
    <div>

        {{-- Otsikkona idean nimi ja tyyppi --}}
        <div class="pb-3">
            <h2>{{ $idea->name }}</h2>
            <h5>{{ $idea->type }}</h5>
        </div>

        <div>

            {{-- 1. rivi: selite --}}
            <div class="col-auto mb-3">
                <label for="description" class="form-label">Selite</label>
                    @if(isset($idea->description))
                        <div class="form-control" name="description">
                            {{ $idea->description }}
                        </div>
                    @else
                        <pre class="form-control" name="description"> </pre>
                    @endif
                </div>
            </div>

            {{-- 2. rivi: verkko-osoite --}}
            <div class="col-auto mb-3">
                <label for="url" class="form-label">Verkko-osoite</label>
                {{-- If-lauseke tunnistaa onko verkko-osoitteessa määritelty protokollaa --}}
                {{-- Huom. jos tämä ei toimi, käytä 'substr( $idea->url, 0, 8 ) === "https://"' --}}
                @if(isset($idea->url) && (str_starts_with($idea->url, 'http://') || str_starts_with($idea->url, 'https://')))
                    <a href="{{ $idea->url }}" class="form-control" name="deadline">{{ $idea->url }}</a>
                @elseif(isset($idea->url))
                    <a href="//{{ $idea->url }}" class="form-control" name="deadline">{{ $idea->url }}</a>
                @else
                    <pre class="form-control" name="deadline"> </pre>
                @endif
            </div>

            {{-- 3. rivi: tilaaja- ja ohjaaja-arvot --}}
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label for="client" class="form-label">Tilaaja</label>
                    @if(isset($idea->client))
                        <p class="form-control" name="client">{{ $idea->client }}</p>
                    @else
                        <pre class="form-control" name="client"> </pre>
                    @endif
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="instructor" class="form-label">Ohjaaja</label>
                    @if(isset($idea->instructor))
                        <p class="form-control" name="instructor">{{ $idea->instructor }}</p>
                    @else
                        <pre class="form-control" name="instructor"> </pre>
                    @endif
                </div>
            </div>

            {{-- 4. rivi: toteutusvaihe ja kiireellisyys --}}
            <div class="row align-items-end">
                <div class="col-6 mb-3">
                    <label for="phase" class="form-label">Toteutusvaihe</label>
                    @if(isset($idea->phase))
                        <p class="form-control" name="phase">{{ $idea->phase }}</p>
                    @else
                        <pre class="form-control" name="phase"> </pre>
                    @endif
                </div>
                <div class="col-auto mb-3">
                    <div class="form-check mb-4">
                        <input type="checkbox" class="form-check-input" name="is_urgent"  style="pointer-events: none" @if($idea->is_urgent) checked @endif>
                        <label class="form-check-label" for="is_urgent">Kiireellinen</label>
                    </div>
                </div>
            </div>

            {{-- 5. rivi: määräaika ja valmistumisaika --}}
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="deadline" class="form-label">Määräaika</label>
                    @if(isset($idea->deadline))
                        <p class="form-control" name="deadline">{{ $idea->deadline }}</p>
                    @else
                        <pre class="form-control" name="deadline"> </pre>
                    @endif
                </div>
                <div class="col-6 mb-3">
                    <label for="completed" class="form-label">Valmistunut</label>
                    @if(isset($idea->completed))
                        <p class="form-control" name="completed">{{ $idea->completed }}</p>
                    @else
                        <pre class="form-control" name="completed"> </pre>
                    @endif
                </div>
            </div>

            {{-- 6. rivi: Muokkaa- ja Takaisin-painikkeet --}}
            <div class="row">
                <div class="col-auto">
                    <form action={{ route('edit_idea') }} method='get'>
                        <button type='submit' class="btn btn-primary" name='id' value={{ $idea->id }}>Muokkaa</button>
                    </form>
                </div>
                <div class="col-auto">
                    <a class="btn btn-outline-primary" href="{{ route('ideas') }}">Takaisin ideoihin</a>
                </div>
            </div>

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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($memberships as $member)
                            <tr>
                                <td><a href="{{ route('contact') }}?id={{ $member->contact_id }}">{{ $member->name }}</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

            </div>

        </div>
    </div>
@endsection