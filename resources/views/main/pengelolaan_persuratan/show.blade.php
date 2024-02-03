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

                        <form action="{{ route('pengelolaan_persuratan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Nama</label>
                                <input type="text" class="form-control" name="user_id" value="{{$user_id}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Ruangan</label>
                                <input type="text" class="form-control" name="surat_id" value="{{$surat_id}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Pegawai</label>
                                <input type="text" class="form-control" name="pegawai_id" value="{{$pegawai}}">
                            </div>


                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">keterangan</label>
                                <input type="text" class="form-control" name="keterangan">
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
