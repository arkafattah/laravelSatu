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

                        <form action="{{ route('user.update', $result->id) }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Kode Pegawai</label>
                                <input type="text" class="form-control" name="kode_pegawai" value="{{ $result->kode_pegawai }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Nama</label>
                                <input type="text" class="form-control" name="name" value="{{ $result->name }}">
                            </div>

                            <div class="form-group">
                                <label for="jab_id">Jabatan ID</label>
                                <select class="form-control" id="jab_id" name="jab_id">
                                    <option value="{{ $result->jabatan->id }}" {{ $result->jabatan->nama == $result->jabatan->id ? 'selected' : '' }}>
                                        --{{ $result->jabatan->nama }}--
                                    </option>
                                    @foreach ($jabatan as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="kelompok_id">Kelompok</label>
                                <select class="form-control" id="kelompok_id" name="kelompok_id">
                                    <option value="{{ $result->kelompok->id }}" {{ $result->kelompok->nama == $result->kelompok->id ? 'selected' : '' }}>
                                        --{{ $result->kelompok->nama }}--
                                    </option>
                                    @foreach ($kelompok as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="no_hp">Nomor HP</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $result->no_hp }}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $result->email }}">
                            </div>

                            <div class="form-group">
                                <label for="password">Password abaikan jika tidak ingin merubah </label>
                                <input type="password" class="form-control" id="password" name="password" value="{{ $result->password }}">
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" id="gender" name="gender">
                                    <option value="Laki-laki" {{ $result->gender == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki
                                    </option>
                                    <option value="Perempuan" {{ $result->gender == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan
                                    </option>
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
