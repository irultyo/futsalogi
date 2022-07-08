@extends('mylayout.master')
@section('content')
    <div class="container-fluid px-0">

        <img src="{{ asset('img/firstpage.png') }}" alt="" width="100%">
        <div class="row ">
            <h1 class="text-center mt-5 mb-4">Lapangan</h1>
            <div class="col d-flex justify-content-evenly">
                @foreach ($lapangan as $item)
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('img/lapangan.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title text-center">Lapangan {{ $item->tipe }}</h3>
                            <p class="card-text text-center">Harga : Rp{{ $item->harga }}</p>                            
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
