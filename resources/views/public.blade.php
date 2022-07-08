@extends('mylayout.master')

@section('content')
<div class="container-fluid mt-5">
    
    <div class="card">
        <div class="card-body">
            
            <h2 class="card-title">Resi</h2>
            <table id="tabel-data">
                <thead>
                    <tr>

                        <th>Resi</th>
                        <th>Penerima</th>
                        <th>Pengirim</th>
                        <th>Alamat pengirim</th>
                        <th>Alamat penerima</th>
                        <th>Layanan</th>
                        <th>Status</th>                       
                    </tr>
                </thead>
                <tbody>

                    @foreach ($resi as $item)
                        <tr>

                            <td>{{ $item->resi }}</td>
                            <td>{{ $item->penerima }}</td>
                            <td>{{ $item->pengirim }}</td>
                            <td>{{ $item->alamatPengirim }}</td>
                            <td>{{ $item->alamatPenerima }}</td>
                            <td>{{ $item->layanan }}</td>
                            <td>{{ $item->status }}</td>
                            
                        </tr>
                    @endforeach

                </tbody>
                <script>
                    $(document).ready(function() {
                        $('#tabel-data').DataTable();
                    });
                </script>
            </table>
        </div>
    </div>
</div>

{{-- @include('dashboard.footers.auth') --}}
</div>
@endsection