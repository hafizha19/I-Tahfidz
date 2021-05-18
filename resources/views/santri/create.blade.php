@extends('layouts.master')

@section('title')
Tambah Santri
@endsection

@section('header')
Tambah Santri
@endsection

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('santri.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">Nama</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama" value="{{ $data->nama ?? '' }}" required autocomplete="nama" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jumlah_hafalan" class="col-md-4 col-form-label text-md-right">Jumlah Hafalan</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="jumlah_hafalan" value="{{ $data->jumlah_hafalan ?? '' }}" required autocomplete="jumlah_hafalan" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="daerah_id" class="col-md-4 col-form-label text-md-right">Lokasi Kecamatan</label>
                            <div class="col-md-6">
                                <select class="cari form-control"  name="daerah_id" id="cari_daerah"></select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis_kelamin" class="col-md-4 col-form-label text-md-right">Jenis Kelamin</label>
                            <div class="col-md-6">
                                <select class="custom-select" id="inputGroupSelect01" name="jenis_kelamin">
                                    <option value="Pria" >Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_lahir" class="col-md-4 col-form-label text-md-right">Tanggal Lahir</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{ $data->tanggal_lahir ?? '' }}" required autocomplete="tanggal_lahir" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_hp" class="col-md-4 col-form-label text-md-right">Nomor HP</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="no_hp" value="{{ $data->no_hp ?? '' }}" required autocomplete="no_hp" autofocus>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('jspage')
<script type="text/javascript">
    $('#cari_daerah').select2({
      placeholder: 'Cari...',
      ajax: {
        url: '/cari-daerah',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
          return {
            results:  $.map(data, function (item) {
              return {
                text: item.kecamatan_name + ", " + item.kabupaten_name,
                id: item.id
              }
            })
          };
        },
        cache: true
      }
    });
  
  </script>
@endsection