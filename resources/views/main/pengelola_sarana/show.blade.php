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

                        <form action="{{ route('pengelola_sarana.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Unit Sarana</label>
                                <input type="text" class="form-control" name="sarana_id" value="{{$sarana_id}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">keterangan</label>
                                <input type="text" class="form-control" name="keterangan">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Jumlah Unit</label>
                                <input type="text" class="form-control" name="jumlah_unit" value="{{$jumlah_unit}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" value="{{$tanggal}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">status</label>
                                <input type="text" class="form-control" name="status">
                            </div>
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
