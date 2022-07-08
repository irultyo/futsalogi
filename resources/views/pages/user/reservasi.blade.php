@extends('mylayout.master')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reservasi</div>

                    <div class="card-body">
                        <form action="{{ route('reservasi.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="namaPemesan" class="form-label">Nama Pemesan</label>
                                <input type="text" class="form-control" id="namaPemesan"
                                    value="{{ Auth::user()->nama_tim }}">
                            </div>
                            <div class="mb-3">
                                <label for="namaTim" class="form-label">Nama Tim</label>
                                <input type="text" class="form-control" id="namaTim"
                                    value=" {{ Auth::user()->nama_tim }}" name="namaTim">
                            </div>
                            <div class="mb-3">
                                <label for="noHp" class="form-label">No Handphone</label>
                                <input type="text" class="form-control" id="noHp"
                                    value="{{ Auth::user()->no_hp }}" name="noHp">
                            </div>
                            <div class=" mb-3">
                                <label class="form-label" for="lapangan">Lapangan</label>
                                <select class="form-select" id="lapangan" name="lapangan">
                                    <option>Choose...</option>
                                    @foreach ($lapangan as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }} {{ $item->tipe }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class=" mb-3">
                                <label class="form-label" for="jam">Jam</label>
                                <select class="form-select" id="jam" name="jam">
                                    <option>Choose...</option>
                                    @foreach ($jam as $item)
                                        <option value="{{ $item->id }}">{{ $item->waktu }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="durasi" class="form-label">Durasi</label>
                                <input type="text" class="form-control" id="durasi" name="durasi">
                            </div>
                            <div class="form-group mb-3">
                                <label for="tanggalMain" class="form-label">Tanggal Main</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                    <input type="text" class="form-control datepicker" name="tanggalMain">
                                </div>
                            </div>
                            <script type="text/javascript">
                                $(function() {
                                    $(".datepicker").datepicker({
                                        format: 'yyyy-mm-dd',
                                        autoclose: true,
                                        todayHighlight: true,
                                    });
                                });
                            </script>
                            <div class=" mb-3">
                                <label class="form-label" for="pembayaran">Pembayaran</label>
                                <select class="form-select" id="pembayaran" name="pembayaran">
                                    <option>Choose...</option>
                                    <option value="1">Tunai</option>
                                    <option value="2">Dana/OVO/Shopeepay</option>
                                    <option value="3">Bank</option>
                                </select>
                            </div>
                            <input type="hidden" name="idUser" value="{{ Auth::user()->id }}">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
