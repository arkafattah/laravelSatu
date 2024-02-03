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

                        <form action="{{ route('pembelian_sarana.update', $id) }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf


                            @if (auth()->user()->role == 'admin')
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">User ID</label>
                                <select class="form-control" name="user_id">
                                    @foreach ($user as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                            @if (auth()->user()->jab_id == 1 || auth()->user()->jab_id == 2 || auth()->user()->jab_id == 3)
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="user_id" value="{{ auth()->user()->id }}">
                            </div>
                            @endif

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Jenis Sarana</label>
                                <select class="form-control" name="jenis_kebutuhan">
                                    @foreach ($sarana as $row)
                                    <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Katalog</label>
                                    <input type="file"class="form-control" name="file1" accept="application/pdf">
                                </div> --}}

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Keterangan</label>
                                <input type="text" class="form-control" name="keterangan" value="{{ $keterangan }}">



                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Tanggal</label>
                                    <?php $tanggal = date('Y-m-d'); ?>
                                    <input type="date" class="form-control" name="tanggal" value="<?= $tanggal ?>">
                                </div>




                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Status</label>
                                    <select class="form-control" name="status">
                                        <option value="pending">pending</option>
                                        <option value="diterima">diterima</option>
                                        <option value="selesai">selesai</option>
                                        <option value="ditolak">ditolak</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan</button>
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
