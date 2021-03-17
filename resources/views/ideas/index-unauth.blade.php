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
@endsection

{{-- Ideat rajoitetusti -sivu --}}
@section('content')
<div class="container-xl py-3 mb-3 shadow rounded-bottom bg-white table-responsive">

    {{-- Taulukko ideoista --}}
    <h2 class="pb-3">Ideat</h2>
    <table id="ideas" class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Nimi</th>
                <th>Tyyppi</th>
                <th>Ohjaaja</th>
                <th>Kiireellinen</th>
                <th>Toteutusvaihe</th>
                <th>Määräaika</th>
            </tr>
        </thead>
        <tbody>

            {{-- Ideoiden haku taulukkoon tietokannasta --}}
            @foreach ($ideas as $idea)
                <tr>
                    <td>{{ $idea->name }}</td>
                    <td>{{ $idea->type }}</td>
                    <td>{{ $idea->instructor }}</a></td>
                    <td class="col-1">
                        <p class="d-none">{{ $idea->is_urgent }}</p> {{-- Piilotettu kentän arvo suodatusta varten --}}
                        <div class="form-check d-flex justify-content-center">
                          <input type="checkbox" class="form-check-input"  style="pointer-events: none" @if($idea->is_urgent) checked @endif>
                        </div>
                      </td>
                    <td>{{ $idea->phase }}</td>
                    <td>{{ $idea->deadline }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection