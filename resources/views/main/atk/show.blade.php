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
                            <label for="exampleFormControlTextarea1">Uraian</label>
                            <input type="text" class="form-control" name="uraian" value="{{$uraian}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Spesifikasi</label>
                            <input type="text" class="form-control" name="spesifikasi" value="{{$spesifikasi}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Satuan</label>
                            <input type="text" class="form-control" name="satuan" value="{{$satuan}}">
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
