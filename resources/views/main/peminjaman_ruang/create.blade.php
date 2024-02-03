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

                        <form action="{{ route('peminjaman_ruang.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Ruangan</label>
                                <select class="form-control" name="ruang_id">

                                    @foreach ($ruang as $br)
                                    <option value="{{ $br->id }}">{{ $br->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Kegiatan</label>
                                <input type="text" class="form-control" name="kegiatan">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Jam Mulai</label>
                                <input type="time" class="form-control" name="mulai">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Selesai</label>
                                <input type="time" class="form-control" name="selesai">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal">
                            </div>

                            @if (auth()->user()->jab_id == 1 || auth()->user()->jab_id == 2 || auth()->user()->jab_id == 3)
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Status</label>
                                <select class="form-control" name="status">
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
                                    <option value="pending">pending</option>
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
