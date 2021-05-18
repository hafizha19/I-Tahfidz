@extends('layouts.master')

@section('title')
Dashboard
@endsection

@section('header')
Aplikasi Persebaran Penghafal Qur'an
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
    </div>
    {{-- <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Sebaran Penghafal Quran</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">7</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Sedang Diperbaiki</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">33</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-play fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Sudah Diperbaiki</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">44</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tasks Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Fasilitas yang sudah diperbaiki
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        @php
                                            // $width = App\Space::where('status', 'Sudah')->count() / App\Space::all()->count() * 100;
                                        @endphp
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: 50%" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-percent fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> --}}
    <div class="row justify-content-center mt-3">
        <div class="col-lg-12">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tentang Aplikasi</h6>
                            
                        </div>
                        <div class="card-body">
                            <p>
                                Aplikasi sistem informasi geografis pemantauan kerusakan fasilitas umum berbasis web merupakan
                                salah satu upaya untuk memudahkan pemerintah daerah setempat dalam memantau fasilitas
                                yang ada, dari informasi yabg didapatkan tersebut pemerintah daerah akan memperbaiki
                                fasilitas yang rusak tersebut. Aplikasi ini dapat digunakan oleh seluruh masyarakat.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Sebaran</div>

                <div class="card-body">
                    <div id="mapContainer" style="height: 500px"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jspage')
<script>
    window.action = "browse"
</script>
@endsection