@extends('layouts.layout_main')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><a href="{{ url('main/peminjaman_ruang/create') }}" class="btn btn-primary">Tambah
                        Data</a>

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
                        <h3 class="card-title">Tabel {{ $title }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Ruangan</th>
                                    <th>Kegiatan</th>
                                    <th>Jam Mulai</th>
                                    <th>Selesai</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    @if (auth()->user()->jab_id == 1 || auth()->user()->jab_id == 2 || auth()->user()->jab_id == 3)
                                    <th>Aksi</th>
                                    @endif
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
                                    <td>{{ $row->ruang->nama }}</td>
                                    <td>{{ $row->kegiatan }}</td>
                                    <td>{{ $row->mulai }}</td>
                                    <td>{{ $row->selesai }}</td>
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
                                    @if (auth()->user()->jab_id == 1 || auth()->user()->jab_id == 2 || auth()->user()->jab_id == 3)
                                    <td>
                                        <a href="/main/peminjaman_ruang/{{ $row->id }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                        <a href="/main/peminjaman_ruang/{{ $row->id }}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('peminjaman_ruang.destroy', $row->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm border-0" onclick="return confirm('Are you sure?'); return false;"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                    @endif
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
@endsection