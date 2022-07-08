@extends('layouts.app')
@section('content')
    @include('layouts.headers.header')
    <div class="container-fluid mt--7">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Tipe Membership</h2>
                <button type="button" class="btn btn-outline-success mb-4" data-bs-toggle="modal"
                    data-bs-target="#createModal">Tambah</button>
                <!-- Modal -->
                <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createModalLabel">Tambah Tipe Membership</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('tipe-membership.store') }}" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama">
                                    </div>
                                    <div class="mb-3">
                                        <label for="harga" class="form-label">Harga</label>
                                        <input type="number" class="form-control" id="harga" name="harga">
                                    </div>
                                    <div class="mb-3">
                                        <label for="jumlah_main" class="form-label">Jumlah Main</label>
                                        <input type="number" class="form-control" id="jumlah_main" name="jumlah_main">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <table id="tabel-data">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Jumlah Main</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($tipe as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->harga }}</td>
                                <td>{{ $item->jumlah_main }}</td>
                                <td><button type="button" class="btn btn-outline-primary mb-4" data-bs-toggle="modal"
                                        data-bs-target="#updateModal-{{ $item->id }}">Edit</button>
                                    {{-- <button type="button" class="btn btn-outline-danger mb-4" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal-{{ $item->id }}">Delete</button> --}}
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal-{{ $item->id }}" tabindex="-1"
                                aria-labelledby="deleteModalLabel-{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel-{{ $item->id }}">Delete</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h3>Yakin ingin menghapus?</h3>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('tipe-membership.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Hapus</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="updateModal-{{ $item->id }}" tabindex="-1"
                                aria-labelledby="updateModalLabel-{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updateModalLabel-{{ $item->id }}">Update
                                                Tipe Membership</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('tipe-membership.update', $item->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Nama</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" value="{{$item->nama}}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="harga" class="form-label">Harga</label>
                                                    <input type="number" class="form-control" id="harga" name="harga" value="{{$item->harga}}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="jumlah_main" class="form-label">Jumlah Main</label>
                                                    <input type="number" class="form-control" id="jumlah_main" name="jumlah_main" value="{{$item->jumlah_main}}">
                                                </div>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
