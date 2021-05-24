@extends('layouts.master')

@section('title')
Registrasi Pesantren
@endsection

@section('header')
Daftarkan pesantren anda di sini
@endsection

@section('content')
<div class="container">
  <div class="row">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
</div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Lengkapi data pesantren</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('ponpes.save') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">Nama</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama" value="{{ $ponpes->nama ?? '' }}" required autocomplete="nama" autofocus>
                            </div>
                        </div>
                        @if (isset($ponpes))
                        <div class="form-group row">
                          <label for="daerah_id" class="col-md-4 col-form-label text-md-right">Lokasi Kecamatan</label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" value="{{ $ponpes->daerah->kecamatan_name ?? '' }}" autofocus readonly>
                          </div>
                        </div>
                        @endif
                        <div class="form-group row">
                            <label for="daerah_id" class="col-md-4 col-form-label text-md-right">Lokasi Kecamatan</label>
                            <div class="col-md-6">
                                <select class="cari form-control"  name="daerah_id" id="cari_daerah"></select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deskripsi" class="col-md-4 col-form-label text-md-right">Deskripsi</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="deskripsi" value="{{ $ponpes->deskripsi ?? '' }}" required autocomplete="deskripsi" autofocus>
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label for="deskripsi" class="col-md-4 col-form-label text-md-right">Deskripsi</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="deskripsi" value="{{ old('deskripsi') }}" required autocomplete="deskripsi" autofocus>
                            </div>
                        </div> --}}

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
    $('#cari_ponpes').select2({
      placeholder: 'Cari...',
      ajax: {
        url: '/cari-ponpes',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
          return {
            results:  $.map(data, function (item) {
              return {
                text: item.nama,
                id: item.id
              }
            })
          };
        },
        cache: true
      }
    });
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