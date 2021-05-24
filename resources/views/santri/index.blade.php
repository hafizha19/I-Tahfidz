@extends('layouts.master')
@section('title')
Santri
@endsection

@section('header')
Santri di Pesantren {{ $data['ponpes'] }}
@endsection
@section('content')
<div class="container m-3">
    <div class="row">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <div class="row mb-3">
                    <div class="col-lg-5">
                        <a href="{{route('santri.create')}}" class="btn btn-primary">Tambah data</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Jumlah Hafalan</th>
                                <th>Daerah</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>No HP</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($data['santri']))
                            @foreach ($data['santri'] as $d)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    {{$d->nama}}
                                </td>
                                <td>
                                    {{$d->jumlah_hafalan}}
                                </td>
                                <td>
                                    {{$d->daerah->kecamatan_name.', '.$d->daerah->kabupaten_name}}
                                </td>
                                <td>
                                    {{$d->jenis_kelamin}}
                                </td>
                                <td>
                                    {{date('d-m-Y', strtotime($d->tanggal_lahir))}}
                                </td>
                                <td>
                                    {{$d->no_hp}}
                                </td>
                                <td>
                                    <form action="{{ route('santri.destroy', $d->id) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" onclick="return confirm('Apa kamu yakin menghapus data ini ?')"
                                            class="btn btn-danger btn-sm">Delete</button>
                                        <a href="{{ route('santri.edit', $d->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection