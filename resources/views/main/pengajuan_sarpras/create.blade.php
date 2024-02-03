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

                            <form action="{{ route('pemeliharaan_sarpras.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="user_id" id="" value="{{ auth()->user()->id }}">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Barang ID</label>
                                    <select class="form-control" name="barang_id">

                                        @foreach ($barang as $br)
                                            <option value="{{ $br->id }}">{{ $br->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Jumlah</label>
                                    <input type="number"class="form-control" name="jumlah">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Keterangan</label>
                                    <input type="text"class="form-control" name="keterangan">
                                </div>

                                @if (auth()->user()->jab_id == 1 || auth()->user()->jab_id == 2 || auth()->user()->jab_id == 3)
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Status</label>
                                        <select class="form-control" name="status">
                                            <option value="pending">pending</option>
                                            <option value="approved">approved</option>
                                            <option value="rejected">rejected</option>
                                        </select>
                                    </div>
                                @endif

                                @if (auth()->user()->jab_id == 4)
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Status</label>
                                        <select class="form-control" name="status">
                                            <option value="pending" selected>pending</option>
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
