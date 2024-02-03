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
    <label for="exampleFormControlTextarea1">Jenis Surat</label>
    <input type="text"class="form-control" name="jenis" value="{{$jenis}}">
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
