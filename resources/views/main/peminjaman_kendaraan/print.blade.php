@extends('layouts.layout_main')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable {{ $title }} <?php echo date('d-m-Y', strtotime($tgl_a)); ?> s/d <?php echo date('d-m-Y', strtotime($tgl_b)); ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kendaraan</th>
                                    <th>Kegiatan</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Jam Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Jam Kembali</th>
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
                                    <td>{{ $row->kendaraan->nopol }}</td>
                                    <td>{{ $row->kegiatan }}</td>
                                    <td>{{ $row->tanggal_pinjam }}</td>
                                    <td>{{ $row->jam_pinjam }}</td>
                                    <td>{{ $row->tanggal_kembali }}</td>
                                    <td>{{ $row->jam_kembali }}</td>
                                    <td>{{ $row->status }}</td>
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
<script>
    window.print();
</script>
@endsection
