@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <script src="{{ asset('/js/html5-qrcode.min.js') }}"></script>
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-outline-success mb-4" data-bs-toggle="modal"
                    data-bs-target="#createModal">Check In</button>

                <!-- Modal -->
                <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createModalLabel">Check In</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div id="reader"></div>
                                    {{-- <script>
                                        // This method will trigger user permissions
                                        Html5Qrcode.getCameras().then(devices => {
                                            /**
                                             * devices would be an array of objects of type:
                                             * { id: "id", label: "label" }
                                             */
                                            if (devices && devices.length) {
                                                var cameraId = devices[0].id;
                                                // .. use this to start scanning.
                                                // Create instance of the object. The only argument is the "id" of HTML element created above.
                                                const html5QrCode = new Html5Qrcode("reader");

                                                html5QrCode.start(
                                                        cameraId, // retreived in the previous step.
                                                        {
                                                            fps: 10, // sets the framerate to 10 frame per second
                                                            qrbox: 250 // sets only 250 X 250 region of viewfinder to
                                                            // scannable, rest shaded.
                                                        },
                                                        qrCodeMessage => {
                                                            // do something when code is read. For example:
                                                            console.log(`QR Code detected: ${qrCodeMessage}`);
                                                        },
                                                        errorMessage => {
                                                            // parse error, ideally ignore it. For example:
                                                            console.log(`QR Code no longer in front of camera.`);
                                                        })
                                                    .catch(err => {
                                                        // Start failed, handle it. For example,
                                                        console.log(`Unable to start scanning, error: ${err}`);
                                                    });
                                            }
                                        }).catch(err => {
                                            // handle err
                                        });
                                    </script> --}}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($reservasi as $item)
                            <tr>

                                <td>{{ $item->user->nama_tim }}</td>
                                <td>{{ $item->user->no_hp }}</td>
                                <td>{{ $item->lapangan->nama }}</td>
                                <td>{{ $item->lama_sewa }} Jam</td>
                                <td>{{ $item->jam->waktu }}</td>
                                <td>{{ $item->tanggal_main }}</td>
                                <td>{{ $item->invoice->total_bayar }}</td>
                                @if ($item->status == 1)
                                    <td>Belum Lunas</td>
                                @elseif($item->status == 2)
                                    <td>Lunas</td>
                                    @elseif($item->status == 3)
                                    <td>Selesai</td>
                                @endif
                                <td><button type="button" class="btn btn-outline-primary mb-4" data-bs-toggle="modal"
                                        data-bs-target="#updateModal-{{ $item->id }}">Edit</button> 
                                        @if($item->status == 2)
                                        <form action="{{ route('reservasi.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" hidden name="type_aksi" value="checkin">
                                            <button type="submit" class="btn btn-outline-primary mb-4" >Check In</button>
                                        </form>
                                        @endif
                                        </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="updateModal-{{ $item->id }}" tabindex="-1"
                                aria-labelledby="updateModalLabel-{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updateModalLabel-{{ $item->id }}">Update
                                                Pembayaran</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('reservasi.update', $item->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" hidden name="type_aksi" value="pembayaran">
                                            <div class="modal-body">
                                                <div class=" mb-3">
                                                    <label class="form-label" for="status">Status</label>
                                                    <select class="form-select" id="status" name="status">
                                                        <option selected>Choose...</option>
                                                        <option {{ $item->status == '1' ? 'selected' : '' }} value="1">Belum Lunas</option>
                                                        <option {{ $item->status == '2' ? 'selected' : '' }} value="2">Lunas</option>
                                                    </select>
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

    {{-- @include('dashboard.footers.auth') --}}
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
