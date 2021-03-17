@extends('layouts.app')

{{-- DataTables-integraatio --}}
@section('datatables')
  <link href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(document).ready(function() {
        $('#ideas').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Finnish.json"
            }
        });
    });
  </script>

{{-- Id:n vienti modaliin --}}
<script>
    $(document).ready(function () {
        $("#removalPrompt").on("show.bs.modal", function (e) {
        var idea_id = $(e.relatedTarget).data('target-id');
        $('#id').val(idea_id);
        });
    });
</script>
    
@endsection

{{-- Ideat-sivu --}}
@section('content')
<div class="container-xl py-3 mb-3 shadow rounded-bottom bg-white table-responsive">

    {{-- Taulukko ideoista --}}
    <h2 class="pb-3">Ideat</h2>
    <table id="ideas" class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Nimi</th>
                <th>Tyyppi</th>
                <th>Tilaaja</th>
                <th>Ohjaaja</th>
                <th>Kiireellinen</th>
                <th>Toteutusvaihe</th>
                <th>Määräaika</th>
                <th style="width: 130px"></th>
            </tr>
        </thead>
        <tbody>

            {{-- Ideoiden haku taulukkoon tietokannasta --}}
            @foreach ($ideas as $idea)
                <tr>
                    <td><a href="{{ route('idea') }}?id={{ $idea->id }}">{{ $idea->name }}</td>
                    <td>{{ $idea->type }}</td>
                    <td><a href="{{ route('contact') }}?id={{ $idea->client_id }}">{{ $idea->client }}</a></td>
                    <td><a href="{{ route('contact') }}?id={{ $idea->instructor_id }}">{{ $idea->instructor }}</a></td>
                    <td class="col-1">
                        <p class="d-none">{{ $idea->is_urgent }}</p> {{-- Piilotettu kentän arvo suodatusta varten --}}
                        <div class="form-check d-flex justify-content-center">
                          <input type="checkbox" class="form-check-input"  style="pointer-events: none" @if($idea->is_urgent) checked @endif>
                        </div>
                      </td>
                    <td>{{ $idea->phase }}</td>
                    <td>{{ $idea->deadline }}</td>

                    {{-- Muokkaa- ja Poista-painikkeet --}}
                    <td>
                        <div class="row g-1">
                            <div class="col">
                                <form action={{ route('edit_idea') }} method='get'>
                                    <button type='submit' class="btn btn-primary btn-sm" name='id' value={{ $idea->id }}>Muokkaa</button>
                                </form>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#removalPrompt" data-target-id={{ $idea->id }}>
                                    Poista
                                </button>
                            </div>
                        </div>
                    </td>
                    
                </tr>
            @endforeach
            
        </tbody>
    </table>

    {{-- Poista-painikkeen modal --}}
    <div class="modal fade" id="removalPrompt" tabindex="-1" aria-labelledby="removalWarning" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="removalWarning">Varoitus!</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Sulje"></button>
            </div>
            <div class="modal-body">
                <p>Tietoja ei voida palauttaa.</p>
                <p>Haluatko varmasti poistaa tämän idean?</p>
            </div>
            <div class="modal-footer">
                <form action={{ route('remove_idea') }} method='post'>
                    @csrf
                    <button type="submit" id="id" name="id" class="btn btn-primary">Poista idea</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Peruuta</button>
            </div>
          </div>
        </div>
    </div>

    {{-- Lisää uusi idea -painike --}}
    <div class="pt-3">
        <a class="btn btn-primary" href="{{ route('add_idea') }}" role="button">Lisää uusi idea</a>
    </div>
</div>
@endsection