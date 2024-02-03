@extends('layouts.layout_main')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->

                @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('hapus'))
                <div class="alert alert-warning">{{ session('hapus') }}</div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    {!! implode('', $errors->all('<li>:message</li>')) !!}
                </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form {{ $title }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="{{ route('peminjaman_kendaraan.update', $id) }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Nama</label>
                                <select class="form-control" name="user_id">
                                    @foreach ($user as $row)
                                    <option @if ($user_id==$row->id)
                                    <option value="{{ $row->id }}" selected>{{ $row->name }}</option>
                                    @else
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endif
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Kendaraan</label>
                                <select class="form-control" name="kendaraan_id">

                                    @foreach ($kendaraan as $br)
                                    <option @if ($kendaraan_id==$br->id)
                                    <option value="{{ $br->id }}" selected>{{ $br->nopol }}</option>
                                    @else
                                    <option value="{{ $br->id }}">{{ $br->nopol }}</option>
                                    @endif
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Kegiatan</label>
                                <input type="text" class="form-control" name="kegiatan" value="{{ $kegiatan }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Tanggal Pinjam</label>
                                <input type="date" class="form-control" name="tanggal_pinjam" value="{{ $tanggal_pinjam }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Jam Pinjam</label>
                                <input type="time" class="form-control" name="jam_pinjam" value="{{ $jam_pinjam }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Tanggal Kembali</label>
                                <input type="date" class="form-control" name="tanggal_kembali" value="{{ $tanggal_kembali }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Jam Kembali</label>
                                <input type="time" class="form-control" name="jam_kembali" value="{{ $jam_kembali }}">
                            </div>

                            @if (auth()->user()->jab_id == 1 || auth()->user()->jab_id == 2 || auth()->user()->jab_id == 3)
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Status</label>
                                <select class="form-control" name="status">

                                    <option value="{{ $status }}" selected>{{ $status }}</option>
                                    <option value="pending">pending</option>
                                    <option value="diterima">diterima</option>
                                    <option value="selesai">selesai</option>
                                    <option value="ditolak">ditolak</option>
                                </select>
                            </div>
                            @endif


                            @if (auth()->user()->jab_id == 4)
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Status</label>
                                <select class="form-control" name="status">
                                    <option value="{{ $status }}" selected>{{ $status }}</option>
                                </select>
                            </div>
                            @endif
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection
