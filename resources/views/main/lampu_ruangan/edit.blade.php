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

                        <form action="{{ route('lampu_ruangan.update',$id) }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">User ID</label>
                                <select class="form-control" name="user_id">
                                    @foreach ($user as $row)
                                    <option @if ($user_id==$row->id)
                                    <option value="{{ $row->id }}" selected>{{ $row->name }}</option>
                                    @else
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endif
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Keterangan</label>
                                <input type="text" class="form-control" name="keterangan" value="{{$keterangan}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Tanggal</label>
                                <input type="date" class="form-control" name="waktu" value="{{$waktu}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Jumlah Lampu</label>
                                <input type="number" class="form-control" name="jumlah_lampu" value="{{$jumlah_lampu}}">
                            </div>

                            @if (auth()->user()->jab_id == 1 || auth()->user()->jab_id == 2 || auth()->user()->jab_id == 3)
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Status</label>
                                <select class="form-control" name="status">
                                    <option value="pending">pending</option>
                                    <option value="diterima">diterima</option>
                                    <option value="selesai">selesai</option>
                                    <option value="ditolak">ditolak</option>
                                </select>
                            </div>
                            @endif


                            @if (auth()->user()->jab_id == 4)
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Status</label>
                                <select class="form-control" name="status">
                                    <option value="{{ $status }}" selected>{{ $status }}</option>
                                </select>
                            </div>
                            @endif
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
