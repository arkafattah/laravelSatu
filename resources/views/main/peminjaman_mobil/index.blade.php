@extends('layouts.layout_main')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><a href="{{ url('main/peminjaman_mobil/create') }}" class="btn btn-primary">Tambah
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
                        <h3 class="card-title">DataTable {{ $title }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>User ID</th>
                                    <th>Mobil ID</th>
                                    <th>Kegiatan</th>
                                    <th>Jam Pinjam</th>
                                    <th>Jam Kembali</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
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
                                    <td>{{ $row->mobil->nama }}</td>
                                    <td>{{ $row->kegiatan }}</td>
                                    <td>{{ $row->jam_pinjam }}</td>
                                    <td>{{ $row->jam_kembali }}</td>
                                    <td>{{ $row->tanggal_pinjam }}</td>
                                    <td>{{ $row->tanggal_kembali }}</td>
                                    <td>{{ $row->status }}</td>
                                    @if (auth()->user()->jab_id == 1 || auth()->user()->jab_id == 2 || auth()->user()->jab_id == 3)
                                    <td>
                                        <a href="/main/peminjaman_mobil/{{ $row->id }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                        <a href="/main/peminjaman_mobil/{{ $row->id }}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('peminjaman_mobil.destroy', $row->id) }}" method="POST" class="d-inline">
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
