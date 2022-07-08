@extends('mylayout.master')

@section('content')
<div class="container-fluid mt-5">
    
    <div class="card">
        <div class="card-body">
            
            <h2 class="card-title">Reservasi</h2>
            <table id="tabel-data">
                <thead>
                    <tr>

                        <th>Nama Tim</th>
                        <th>No HP</th>
                        <th>Lapangan</th>
                        <th>Durasi</th>
                        <th>Jam Main</th>
                        <th>Tanggal Main</th>
                        <th>Total Bayar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($user->reservasi as $item)
                        <tr>

                            <td>{{ Auth::user()->nama_tim }}</td>
                            <td>{{ Auth::user()->no_hp }}</td>
                            <td>{{ $item->lapangan->nama }}</td>
                            <td>{{ $item->lama_sewa }} Jam</td>
                            <td>{{ $item->jam->waktu }}</td>
                            <td>{{ $item->tanggal_main }}</td>
                            <td>{{ $item->invoice->total_bayar }}</td>
                            @if($item->status == 1)
                            <td>Lunasi Pembayaran</td>
                            @elseif($item->status == 2)
                            <td>Lunas</td>
                            @elseif($item->status == 3)
                            <td>Selesai</td>
                            {{-- <td>{{ $item->status }}</td> --}}
                            @endif
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