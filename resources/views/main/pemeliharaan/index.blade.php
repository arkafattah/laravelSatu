@extends('layouts.layout_main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><a href="{{ url('main/laporan/pemeliharaan/create') }}" class="btn btn-primary">Tambah
                            Data</a>


                        @if (auth()->user()->jab_id == 1 || auth()->user()->jab_id == 2 || auth()->user()->jab_id == 3)
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Cetak Data
                            </button>
                        @endif
                    </h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="container-fluid" style="padding-left: 2%;">
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
                            <h3 class="card-title">DataTable {{ $title }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>User ID</th>
                                        <th>Barang ID</th>
                                        <th>Jumlah</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $urutan = 1;
                                    @endphp
                                    @foreach ($result as $row)
                                        <tr>
                                            <td>{{ $urutan++ }}</td>
                                            <td>{{ $row->user->name }}</td>
                                            <td>{{ $row->barang->nama }}</td>
                                            <td>{{ $row->jumlah }}</td>
                                            <td>{{ $row->keterangan }}</td>
                                            <td>{{ $row->status }}</td>
                                            <td>
                                                <a href="/main/laporan/pemeliharaan/{{ $row->id }}"
                                                    class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                                <a href="/main/laporan/pemeliharaan/{{ $row->id }}/edit"
                                                    class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                <form action="{{ route('pemeliharaan.destroy', $row->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm border-0"
                                                        onclick="return confirm('Are you sure?'); return false;"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('pemeliharaan.print') }}" method="POST" enctype="multipart/form-data">
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
                            <input type="date"class="form-control" name="tgl_a">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Tanggal Akhir</label>
                            <input type="date"class="form-control" name="tgl_b">
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
