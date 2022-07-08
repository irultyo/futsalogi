@extends('layouts.app')
@section('content')
    @include('layouts.headers.header')
    <div class="container-fluid mt--7">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Membership</h2>
                <button type="button" class="btn btn-outline-success mb-4" data-bs-toggle="modal"
                    data-bs-target="#createModal">Tambah</button>
                <!-- Modal -->
                <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createModalLabel">Tambah Membership</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('membership.store') }}" method="post">
                                @csrf
                                <div class="modal-body">                                    
                                    <div class=" mb-3">
                                        <label class="form-label" for="user">User (Nama Tim)</label>
                                        <select class="form-select" id="user" name="user">
                                            <option selected>Choose...</option>
                                            @foreach ($user as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_tim }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class=" mb-3">
                                        <label class="form-label" for="tipe">Tipe Membership</label>
                                        <select class="form-select" id="tipe" name="tipe">
                                            <option selected>Choose...</option>
                                            @foreach ($tipe as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class=" mb-3">
                                        <label class="form-label" for="status">Status</label>
                                        <select class="form-select" id="status" name="status">
                                            <option selected>Choose...</option>
                                            <option value="1">Belum Lunas</option>
                                            <option value="2">Lunas</option>
                                        </select>
                                    </div>
                                    <div class=" mb-3">
                                        <label class="form-label" for="pembayaran">Pembayaran</label>
                                        <select class="form-select" id="pembayaran" name="pembayaran">
                                            <option>Choose...</option>
                                            <option value="1">Tunai</option>
                                            <option value="2">Dana/OVO/Shopeepay</option>
                                            <option value="3">Bank</option>
                                        </select>
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
                            <th>Nama Tim</th>
                            <th>Membership</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($membership as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->user->nama_tim }}</td>
                                <td>{{ $item->tipeMembership->nama }}</td>
                                @if($item->status == 1)
                                <td>Tidak aktif</td>
                                @elseif($item->status == 2)
                                <td>aktif</td>
                                @endif
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
                                            <form action="{{ route('membership.destroy', $item->id) }}" method="post">
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
                                                Membership</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('membership.update', $item->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                
                                                <div class=" mb-3">
                                                    <label class="form-label" for="user">User (Nama Tim)</label>
                                                    <select class="form-select" id="user" name="user">                                                        >
                                                        <option selected>Choose...</option>
                                                        @foreach ($user as $items)
                                                            <option {{ $item->user_id == $items->id ? 'selected' : '' }}
                                                                value="{{ $items->id }}">{{ $items->nama_tim }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class=" mb-3">
                                                    <label class="form-label" for="tipe">Tipe Membership</label>
                                                    <select class="form-select" id="tipe" name="tipe">
                                                        <option selected>Choose...</option>
                                                        @foreach ($tipe as $items)
                                                            <option
                                                                {{ $item->tipe_membership_id == $items->id ? 'selected' : '' }}
                                                                value="{{ $items->id }}">{{ $items->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                
                                                <div class=" mb-3">
                                                    <label class="form-label" for="status">Status</label>
                                                    <select class="form-select" id="status" name="status">
                                                        <option selected>Choose...</option>
                                                        <option {{ $item->status == '1' ? 'selected' : '' }} value="1">Belum Lunas</option>
                                                        <option {{ $item->status == '2' ? 'selected' : '' }} value="2">Lunas</option>
                                                    </select>
                                                </div>
                                                <div class=" mb-3">
                                                    <label class="form-label" for="pembayaran">Pembayaran</label>
                                                    <select class="form-select" id="pembayaran" name="pembayaran">
                                                        <option>Choose...</option>
                                                        <option {{ $item->user->invoiceMembership->tipe_bayar == '1' ? 'selected' : '' }} value="1">Tunai</option>
                                                        <option {{ $item->user->invoiceMembership->tipe_bayar == '2' ? 'selected' : '' }} value="2">Dana/OVO/Shopeepay</option>
                                                        <option {{ $item->user->invoiceMembership->tipe_bayar == '3' ? 'selected' : '' }} value="3">Bank</option>
                                                    </select>
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
