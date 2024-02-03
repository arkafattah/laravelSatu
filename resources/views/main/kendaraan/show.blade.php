@extends('layouts.layout_main')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form {{ $title }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Jenis Kendaraan</label>
                            <input type="text" class="form-control" name="jenis" value="{{$jenis}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Nomor Polisi</label>
                            <input type="text" class="form-control" name="nopol" value="{{$nopol}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Tipe</label>
                            <input type="text" class="form-control" name="tipe" value="{{$tipe}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Warna</label>
                            <input type="text" class="form-control" name="warna" value="{{$warna}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Tahun</label>
                            <input type="text" class="form-control" name="tahun" value="{{$tahun}}">
                        </div>
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