@extends('layouts.app')

{{-- DataTables-integraatio --}}
@section('datatables')
  <link href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(document).ready(function() {
        $('#contacts').DataTable({
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
        var contact_id = $(e.relatedTarget).data('target-id');
        $('#id').val(contact_id);
      });
    });
  </script>

@endsection

{{-- Yhteystiedot -sivu --}}
@section('content')
  <div class="container-xl py-3 mb-3 shadow rounded-bottom bg-white table-responsive">

  {{-- Taulukko yhteystiedoista --}}
  <h2 class="pb-3">Yhteystiedot</h2>
    <table id="contacts" class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Nimi</th>
            <th>Yritys</th>
            <th>Tilaaja</th>
            <th>Ohjaaja</th>
            <th>Ryhmä</th>
            <th style="width: 130px"></th>
          </tr>
        </thead>
        <tbody>

          {{-- Yhteystietojen haku taulukkoon tietokannasta --}}
          @foreach ($contacts as $contact)
            <tr>
              <td><a href="{{ route('contact') }}?id={{ $contact->id }}">{{ $contact->name }}</a></td>
              <td>{{ $contact->company }}</td>
              <td class="col-1">
                <p class="d-none">{{ $contact->is_client }}</p> {{-- Piilotettu kentän arvo suodatusta varten --}}
                <div class="form-check d-flex justify-content-center">
                  <input type="checkbox" class="form-check-input"  style="pointer-events: none" @if($contact->is_client) checked @endif>
                </div>
              </td>
              <td class="col-1">
                <p class="d-none">{{ $contact->is_instructor }}</p> {{-- Piilotettu kentän arvo suodatusta varten --}}
                <div class="form-check d-flex justify-content-center">
                  <input type="checkbox" class="form-check-input"  style="pointer-events: none" @if($contact->is_instructor) checked @endif>
                </div>
              </td>
              <td>{{ $contact->group }}</td>

              {{-- Muokkaa- ja Poista-painikkeet--}}
              <td>
                <div class="row g-1">
                    <div class="col">
                        <form action={{ route('edit_contact') }} method='get'>
                            <button type='submit' class="btn btn-primary btn-sm" name='id' value={{ $contact->id }}>Muokkaa</button>
                        </form>
                    </div>
                    <div class="col">
                      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#removalPrompt" data-target-id={{ $contact->id }}>
                          Poista
                      </button>
                  </div>
                </div>
              </td>
            
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
              <p>Haluatko varmasti poistaa tämän yhteystiedon?</p>
          </div>
          <div class="modal-footer">
              <form action={{ route('remove_contact') }} method='post'>
                  @csrf
                  <button type="submit" id="id" name="id" class="btn btn-primary">Poista yhteystieto</button>
              </form>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Peruuta</button>
          </div>
        </div>
      </div>
    </div>

    {{-- Lisää uusi idea -painike --}}
    <div class="pt-3">
      <a class="btn btn-primary" href="{{ route('add_contact') }}" role="button">Lisää uusi yhteystieto</a>
    </div>

  </div>
@endsection