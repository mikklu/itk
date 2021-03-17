@extends('layouts.app')

{{-- DataTables-integraatio --}}
@section('datatables')
  <link href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(document).ready(function() {
        $('#users').DataTable({
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
        var user_id = $(e.relatedTarget).data('target-id');
        $('#id').val(user_id);
      });
    });
  </script>
  
@endsection

@section('content')
<div class="container col-xl-5 py-3 mb-3 shadow rounded-bottom bg-white table-responsive">

  {{-- Listaus käyttäjistä --}}
  <h2 class="pb-3">Käyttäjät</h2>
  <table id="users" class="table table-striped table-hover col-auto">
      <thead>
        <tr>
          <th>Käyttäjänimi</th>
          <th style="width: 55px"></th>
        </tr>
      </thead>
      <tbody>

        {{-- Käyttäjien haku tietokannasta taulukkoon --}}
        @foreach ($users as $user)
          <tr>
              <td>{{ $user->username }}</td>
              <td>
                {{-- Poista-painike vain muille kuin omalle tai admin-käyttäjälle --}}
                @if(!(auth()->user()->id == $user->id || $user->id == 1))
                  <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#removalPrompt" data-target-id={{ $user->id }}>
                    Poista
                  </button>
                @endif
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
            <p>Haluatko varmasti poistaa tämän käyttäjän?</p>
        </div>
        <div class="modal-footer">
            <form action={{ route('remove_user') }} method='post'>
                @csrf
                <button type="submit" id="id" name="id" class="btn btn-primary">Poista käyttäjä</button>
            </form>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Peruuta</button>
        </div>
      </div>
    </div>
  </div>

  {{-- Lisää uusi käyttäjä -painike --}}
  <div class="pt-3">
    <a class="btn btn-primary" href="{{ route('add_user') }}" role="button">Lisää uusi käyttäjä</a>
  </div>

</div>
@endsection