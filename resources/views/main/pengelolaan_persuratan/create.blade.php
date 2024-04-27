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
                            <input type="hidden" class="form-control" name="user_id" value="{{ auth()->user()->id }}">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Jenis Surat</label>
                                <select class="form-control" name="surat_id">
                                    @foreach ($surat as $row)
                                    <option value="{{ $row->id }}">{{ $row->jenis }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Pegawai</label>
                                <select class="form-control select2" name="pegawai[]" multiple>
                                    <option value="Prof. Dr. Toni Toharudin">Prof. Dr. Toni Toharudin</option>
                                    <option value="Noviyanto">Noviyanto</option>
                                    <option value="Yulianti AS">Yulianti AS</option>
                                    <option value="Taufan Setyo Pranggono">Taufan Setyo Pranggono</option>
                                    <option value="Agus Muhammad Ali">Agus Muhammad Ali</option>
                                    <option value="Tri Munanto">Tri Munanto</option>
                                    <option value="Prita Ekasari">Prita Ekasari</option>
                                    <option value="Dhita Widya Putri">Dhita Widya Putri</option>
                                    <option value="Lukman Hakim">Lukman Hakim</option>
                                    <option value="Elih Ermawati">Elih Ermawati</option>
                                    <option value="Regina Dwi Vania">Regina Dwi Vania</option>
                                    <option value="Ikhsan Riyanda">Ikhsan Riyanda</option>
                                    <option value="Titah Widihastuti">Titah Widihastuti</option>
                                    <option value="Raafita Agustiana">Raafita Agustiana</option>
                                    <option value="Mulhadi">Mulhadi</option>
                                    <option value="Hidayat">Hidayat</option>
                                    <option value="Herlina">Herlina</option>
                                    <option value="Asri Fika Agusti">Asri Fika Agusti</option>
                                    <option value="Afrida Anis">Afrida Anis</option>
                                    <option value="Wiji Murdoko">Wiji Murdoko</option>
                                    <option value="Ina Agustiani">Ina Agustiani</option>
                                    <option value="Yudha Satria">Yudha Satria</option>
                                    <option value="Yan Medya Putri">Yan Medya Putri</option>
                                    <option value="Dian Rusdiana">Dian Rusdiana</option>
                                    <option value="Felizia Novi Kristanti">Felizia Novi Kristanti</option>
                                    <option value="Agung Permana N">Agung Permana N</option>
                                    <option value="Fiqih Hidayah">Fiqih Hidayah</option>
                                    <option value="Adhy Purnama">Adhy Purnama</option>
                                    <option value="Virna Pradini Nazhar">Virna Pradini Nazhar</option>
                                    <option value="Prima Satria">Prima Satria</option>
                                    <option value="Maghfira Syalendri Alqadri">Maghfira Syalendri Alqadri</option>
                                    <option value="Aprie Wellandira Suhardi">Aprie Wellandira Suhardi</option>
                                    <option value="Naorah Putri Anggelia">Naorah Putri Anggelia</option>
                                    <option value="Alfikri Mirza Rosadi">Alfikri Mirza Rosadi</option>
                                    <option value="Yeni Handayani">Yeni Handayani</option>
                                    <option value="Syarifudin">Syarifudin</option>
                                    <option value="Nur Fadillah">Nur Fadillah</option>
                                    <option value="Nurul Fajri">Nurul Fajri</option>
                                    <option value="Finda Tyas Alfianti">Finda Tyas Alfianti</option>
                                    <option value="Welfrid Phedra Sipahutar">Welfrid Phedra Sipahutar</option>
                                    <option value="Risma Testir">Risma Testir</option>
                                    <option value="Fita Pervita Sari">Fita Pervita Sari</option>
                                    <option value="Ririh Diyah Pratista">Ririh Diyah Pratista</option>
                                    <option value="Almadinda">Almadinda</option>
                                    <option value="Maulani Yasintha">Maulani Yasintha</option>
                                    <option value="Antonius Pantun Andika Manurung">Antonius Pantun Andika Manurung</option>
                                    <option value="Tantri Rinjani">Tantri Rinjani</option>
                                    <option value="Suratmi">Suratmi</option>
                                    <option value="Endang Sutisna">Endang Sutisna</option>
                                    <option value="Achmadi">Achmadi</option>
                                    <option value="Irmi Asnita">Irmi Asnita</option>
                                    <option value="Ahmad Mustaadi">Ahmad Mustaadi</option>
                                    <option value="Suparman">Suparman</option>
                                    <option value="Sukiyana">Sukiyana</option>
                                    <option value="Reviva Rosmawati">Reviva Rosmawati</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">keterangan</label>
                                <input type="text" class="form-control" name="keterangan">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Lampiran</label>
                                <input type="file" class="form-control" name="file1" accept="application/pdf">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Tanggal</label>
                                <?php $tanggal = date('Y-m-d'); ?>
                                <input type="date" class="form-control" name="tanggal" value="<?= $tanggal ?>">
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
                                    <option value="pending">pending</option>
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
