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
                            <label for="exampleFormControlTextarea1">Jenis Sarana</label>
                            <input type="number" class="form-control" name="sarana" value="{{$sarana}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Katalog</label>
                            <img src="{{ asset('uploads')}}/{{ $katalog }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">keterangan</label>
                            <input type="text" class="form-control" name="keterangan">

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">tanggal</label>
                                <input type="text" class="form-control" name="tanggal">

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