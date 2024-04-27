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
                                    <th>Jenis Surat</th>
                                    <th>pegawai</th>
                                    <th>keterangan</th>
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
                                    <td>{{ $row->user_id }}</td>
                                    <td>{{ $row->surat_id }}</td>
                                    <td>{{ $row->pegawai }}</td>
                                    <td>{{ $row->keterangan }}</td>
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
<script>
    window.print();
</script>
@endsection
