@extends('layouts.app')
@section('content')
<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
  <div class="container d-flex align-items-center">

    <h1 class="logo mr-auto"><a href="/">I-Tahfidz</a></h1>

    <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li class="active"><a href="/">Home</a></li>
        <li><a href="#data">Data</a></li>
        <li><a href="#kerjasama">Kerjasama</a></li>
        <li><a href="#contact">Contact</a></li>

      </ul>
    </nav><!-- .nav-menu -->

    <a href="{{ route('login') }}" class="get-started-btn scrollto">Login</a>

  </div>
</header><!-- End Header -->
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

  <div class="container">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up"
        data-aos-delay="200">
        <h1>Sebaran Hafidz/ah</h1>
        <h2>Lihat penyebaran daerah para penghafal Qur'an dan investasikan dana untuk pembangunan pesantren di daerah
          mereka.</h2>
        <div class="d-lg-flex mt-2">
          <a href="#sebaran" class="btn-get-started scrollto mr-2">Lihat Semua</a>
          <a href="{{route('ponpes.dashboard')}}" class="btn-light">Saya ingin mendaftarkan santri</a>
          {{-- <button type="button" class="btn-light">Tambah Data</button> --}}
          {{-- @if (Route::has('login'))
            @auth
            <a href="{{ url('/home') }}" class="btn-get-started">Daftarkan Pondokmu</a>

          @else
          <a href="{{ route('login') }}" class="btn-get-started">Daftarkan Pondokmu</a>

          @endauth
          @endif --}}
        </div>
      </div>
      <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
        <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
      </div>
    </div>
  </div>

</section><!-- End Hero -->

<main id="main">
  <section class="about" id="sebaran">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Sebaran Penghafal Quran</h2>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              {{-- <div id="mapContainer" style="height: 500px"></div> --}}
              <div id='map' style='height: 500px;'></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    </div>
  </section>

  <section id="data" class="team section-bg">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Data Penghafal Quran</h2>
        {{-- <p>Pondok Pesantren yang bekerja sama dengan SIG Hafidz/ah</p> --}}
      </div>

      <div class="row">
        @foreach ($data['prov'] as $d)
        @if ($d['total'] != 0 || $d['same'] != 0)
        <div class="col-lg-6 mt-4">
          <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="300">
            <div class="pic"><img
                src="data:image/jpeg;base64,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"
                class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>{{$d['name']}}</h4>
              <h6 class="badge badge-primary">{{$d['total']}} penghafal Quran</h6>
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: {{100*($d['same']/$d['total'])}}%" aria-valuenow="{{$d['same']}}"
                  aria-valuemin="0" aria-valuemax="{{$d['total']}}">
                </div>
              </div>
              <p>{{$d['same']}} dari {{$d['total']}} penghafal Quran belajar di Pondok Pesantren di provinsi yang sama</p>
              <div class="social">
                <a href=""><i class="ri-twitter-fill"></i></a>
                <a href=""><i class="ri-facebook-fill"></i></a>
                <a href=""><i class="ri-instagram-fill"></i></a>
                <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
              </div>
            </div>
          </div>
        </div>
        @endif
        @endforeach

      </div>

    </div>
  </section><!-- End Team Section -->

  <section id="kerjasama" class="about">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Bekerja sama dengan</h2>
        {{-- @dump($data['data'][count($data['data'])-2]) --}}
      </div>
      <div class="row content">
        {{-- @dump($data) --}}
        @foreach ($data['ponpes'] as $p)
        <div class="col-lg-3">
          <blockquote class="blockquote">
            <p class="mb-0">{{$p->nama}}</p>
            <footer class="blockquote-footer">{{$p->kota}}</footer>
          </blockquote>
        </div>
        @endforeach
      </div>

    </div>
  </section>
  <section id="contact" class="contact section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Contact Us</h2>
        <p>Punya pertanyaan? Kirimkan kami surel melalui form di bawah ini</p>
      </div>

      <div class="row">

        <div class="col-lg-5 d-flex align-items-stretch">
          <div class="info">
            <div class="address">
              <i class="icofont-google-map"></i>
              <h4>Location:</h4>
              <p>Selong, Lombok Timur</p>
            </div>

            <div class="email">
              <i class="icofont-envelope"></i>
              <h4>Email:</h4>
              <p>contact@itahfidz.com</p>
            </div>

            <div class="phone">
              <i class="icofont-phone"></i>
              <h4>Call:</h4>
              <p>+62 85159499432</p>
            </div>
            <iframe
              src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland+(I-Tahfidz)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
              frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
          </div>

        </div>

        <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="name">Your Name</label>
                <input type="text" name="name" class="form-control" id="name" data-rule="minlen:4"
                  data-msg="Please enter at least 4 chars" />
                <div class="validate"></div>
              </div>
              <div class="form-group col-md-6">
                <label for="name">Your Email</label>
                <input type="email" class="form-control" name="email" id="email" data-rule="email"
                  data-msg="Please enter a valid email" />
                <div class="validate"></div>
              </div>
            </div>
            <div class="form-group">
              <label for="name">Subject</label>
              <input type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4"
                data-msg="Please enter at least 8 chars of subject" />
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <label for="name">Message</label>
              <textarea class="form-control" name="message" rows="10" data-rule="required"
                data-msg="Please write something for us"></textarea>
              <div class="validate"></div>
            </div>
            <div class="mb-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->
</main><!-- End #main -->
@endsection
@section('jspage')
<script>
  // window.action = "browse"
  L.mapbox.accessToken = 'pk.eyJ1IjoiaGFmaXpoYTE5IiwiYSI6ImNrbm9kbDV0ZTB4M3kyd285OXlwZ2hpZHUifQ.l3vGVHK_-6vPMTVCEcP9mg';
var map = L.mapbox.map('map')
    .setView([-7.566667, 114.933998], 6)
    .addLayer(L.mapbox.styleLayer('mapbox://styles/mapbox/streets-v11'));

var myLayer = L.mapbox.featureLayer().addTo(map);
var geojson = {
    "type": "FeatureCollection",
    "features": [
        <?php
        echo $data['js'];
        ?>
    ]
}
myLayer.setGeoJSON(geojson);
myLayer.on("click", function(e) {
    window.open(e.layere.feature.properties.url);
});
</script>
@endsection