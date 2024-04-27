@extends('layouts.layout_main')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Cetak Data
                    </button>
                </h1>
            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="container-fluid" style="padding-inline-start: 2%;">
</div>
<br>

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
                        <h3 class="card-title">{{ $title }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Unit Sarana</th>
                                    <th>Keterangan</th>
                                    <th>Jumlah Unit</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $urutan = 1;
                                @endphp
                                @foreach ($result as $row)
                                <tr>
                                    <td>{{ $urutan++ }}</td>
                                    <td>{{ $row->users->name }}</td>
                                    <td>{{ $row->sarana->model }}</td>
                                    <td>{{ $row->keterangan }}</td>
                                    <td>{{ $row->jumlah_unit }}</td>
                                    <td>{{ $row->tanggal }}</td>
                                    <td> @if ($row->status == "pending")
                                        <span class="badge badge-warning">pending</span>
                                        @endif
                                        @if ($row->status == "diterima")
                                        <span class="badge badge-primary">diterima</span>
                                        @endif
                                        @if ($row->status == "selesai")
                                        <span class="badge badge-success">selesai</span>
                                        @endif
                                        @if ($row->status == "ditolak")
                                        <span class="badge badge-danger">ditolak</span>
                                        @endif

                                    </td>

                                </tr>
                                @endforeach
                        </table>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('pengelola_sarana.print') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cetak Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Tanggal Awal</label>
                        <input type="date" class="form-control" name="tgl_a">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Tanggal Akhir</label>
                        <input type="date" class="form-control" name="tgl_b">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Cetak</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
