<DOCTYPE HTML>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Kelompok 3 Godzilla FullStack 4">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <title>Gym and Court App</title>

  <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">

    <link rel="stylesheet" href="{{ asset('css/templatemo-training-studio.css') }}">

    <style>
        p.motto {
            text-align: justify;
        }

        .scroll-container {
        display: flex;
        overflow-x: auto;
        white-space: nowrap;
        scrollbar-width: none; 
        padding: 10px 0;
        }

        .scroll-container::-webkit-scrollbar {
            display: none; 
        }

        .review-card {
            flex: 0 0 auto;
            margin-right: 15px; 
        }

        .card {
            width: 100%;
            max-width: 300px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-body {
            padding: 15px;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .card-title {
            margin-bottom: 10px;
            font-size: 1.2em;
        }

        .card-text {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;
            word-wrap: break-word;
            max-height: 100px;
            margin-bottom: 10px;
            line-height: 1.5;
        }

        .star {
            color: #FFD700;
        }

        .court {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .trainer-item {
            height: 500px;
            display: flex;
            flex-direction: column;
        }

        .trainer-item .image-thumb img {
            width: 100%;
            height: 250px; 
            object-fit: cover;
        }

        .image-thumb {
            flex: 1;
        }

        .image-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

    </style>

</head>

<body>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol xmlns="http://www.w3.org/2000/svg" id="facebook" viewBox="0 0 24 24">
            <path fill="currentColor" d="M9.198 21.5h4v-8.01h3.604l.396-3.98h-4V7.5a1 1 0 0 1 1-1h3v-4h-3a5 5 0 0 0-5 5v2.01h-2l-.396 3.98h2.396v8.01Z" />
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="youtube" viewBox="0 0 32 32">
            <path fill="currentColor" d="M29.41 9.26a3.5 3.5 0 0 0-2.47-2.47C24.76 6.2 16 6.2 16 6.2s-8.76 0-10.94.59a3.5 3.5 0 0 0-2.47 2.47A36.13 36.13 0 0 0 2 16a36.13 36.13 0 0 0 .59 6.74a3.5 3.5 0 0 0 2.47 2.47c2.18.59 10.94.59 10.94.59s8.76 0 10.94-.59a3.5 3.5 0 0 0 2.47-2.47A36.13 36.13 0 0 0 30 16a36.13 36.13 0 0 0-.59-6.74ZM13.2 20.2v-8.4l7.27 4.2Z"
            />
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="twitter" viewBox="0 0 256 256">
            <path fill="currentColor" d="m245.66 77.66l-29.9 29.9C209.72 177.58 150.67 232 80 232c-14.52 0-26.49-2.3-35.58-6.84c-7.33-3.67-10.33-7.6-11.08-8.72a8 8 0 0 1 3.85-11.93c.26-.1 24.24-9.31 39.47-26.84a110.93 110.93 0 0 1-21.88-24.2c-12.4-18.41-26.28-50.39-22-98.18a8 8 0 0 1 13.65-4.92c.35.35 33.28 33.1 73.54 43.72V88a47.87 47.87 0 0 1 14.36-34.3A46.87 46.87 0 0 1 168.1 40a48.66 48.66 0 0 1 41.47 24H240a8 8 0 0 1 5.66 13.66Z"
            />
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="instagram" viewBox="0 0 256 256">
            <path fill="currentColor" d="M128 80a48 48 0 1 0 48 48a48.05 48.05 0 0 0-48-48Zm0 80a32 32 0 1 1 32-32a32 32 0 0 1-32 32Zm48-136H80a56.06 56.06 0 0 0-56 56v96a56.06 56.06 0 0 0 56 56h96a56.06 56.06 0 0 0 56-56V80a56.06 56.06 0 0 0-56-56Zm40 152a40 40 0 0 1-40 40H80a40 40 0 0 1-40-40V80a40 40 0 0 1 40-40h96a40 40 0 0 1 40 40ZM192 76a12 12 0 1 1-12-12a12 12 0 0 1 12 12Z"
            />
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="whatsapp" viewBox="0 0 308 308">
            <!-- Tambahkan path atau element lainnya sesuai dengan SVG ikon WhatsApp -->
            <path id="XMLID_469_" d="M227.904,176.981c-0.6-0.288-23.054-11.345-27.044-12.781c-1.629-0.585-3.374-1.156-5.23-1.156 c-3.032,0-5.579,1.511-7.563,4.479c-2.243,3.334-9.033,11.271-11.131,13.642c-0.274,0.313-0.648,0.687-0.872,0.687 c-0.201,0-3.676-1.431-4.728-1.888c-24.087-10.463-42.37-35.624-44.877-39.867c-0.358-0.61-0.373-0.887-0.376-0.887 c0.088-0.323,0.898-1.135,1.316-1.554c1.223-1.21,2.548-2.805,3.83-4.348c0.607-0.731,1.215-1.463,1.812-2.153 c1.86-2.164,2.688-3.844,3.648-5.79l0.503-1.011c2.344-4.657,0.342-8.587-0.305-9.856c-0.531-1.062-10.012-23.944-11.02-26.348 c-2.424-5.801-5.627-8.502-10.078-8.502c-0.413,0,0,0-1.732,0.073c-2.109,0.089-13.594,1.601-18.672,4.802 c-5.385,3.395-14.495,14.217-14.495,33.249c0,17.129,10.87,33.302,15.537,39.453c0.116,0.155,0.329,0.47,0.638,0.922 c17.873,26.102,40.154,45.446,62.741,54.469c21.745,8.686,32.042,9.69,37.896,9.69c0.001,0,0.001,0,0.001,0 c2.46,0,4.429-0.193,6.166-0.364l1.102-0.105c7.512-0.666,24.02-9.22,27.775-19.655c2.958-8.219,3.738-17.199,1.77-20.458 C233.168,179.508,230.845,178.393,227.904,176.981z"></path> <path id="XMLID_470_" d="M156.734,0C73.318,0,5.454,67.354,5.454,150.143c0,26.777,7.166,52.988,20.741,75.928L0.212,302.716 c-0.484,1.429-0.124,3.009,0.933,4.085C1.908,307.58,2.943,308,4,308c0.405,0,0.813-0.061,1.211-0.188l79.92-25.396 c21.87,11.685,46.588,17.853,71.604,17.853C240.143,300.27,308,232.923,308,150.143C308,67.354,240.143,0,156.734,0z M156.734,268.994c-23.539,0-46.338-6.797-65.936-19.657c-0.659-0.433-1.424-0.655-2.194-0.655c-0.407,0-0.815,0.062-1.212,0.188 l-40.035,12.726l12.924-38.129c0.418-1.234,0.209-2.595-0.561-3.647c-14.924-20.392-22.813-44.485-22.813-69.677 c0-65.543,53.754-118.867,119.826-118.867c66.064,0,119.812,53.324,119.812,118.867 C276.546,215.678,222.799,268.994,156.734,268.994z"></path> </g> </g></svg>
        </symbol>
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="display: none;">
            <symbol id="tiktok" viewBox="0 0 24 24">
                <path d="M21 2H3a1 1 0 0 0-1 1v18a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1Zm-3.281 8.725a3.602 3.602 0 0 1-.328.017A3.571 3.571 0 0 1 14.4 9.129v5.493a4.061 4.061 0 1 1-4.06-4.06c.085 0 .167.008.251.013v2a2.067 2.067 0 1 0-.251 4.119 2.123 2.123 0 0 0 2.16-2.045l.02-9.331h1.914A3.564 3.564 0 0 0 17.719 8.5Z"/>
            </symbol>
    </svg>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Awal Area Header ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{ url('/dashboard') }}" class="logo">Godzilla<em> Sport</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Beranda</a></li>
                            <li class="scroll-to-section"><a href="#features">Layanan Kami</a></li>
                            <li class="scroll-to-section"><a href="#sewa-alat">Produk</a></li>
                            <li class="scroll-to-section"><a href="#our-classes">Kelas</a></li>
                            <li class="scroll-to-section"><a href="#contact-us">Kontak</a></li> 
                            <li class="main-button"><a href="{{ route('login') }}">Login</a></li>
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Akhir Area Header ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <video autoplay muted loop id="bg-video">
            <source src="{{ asset('images/gym-video.mp4') }}" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="caption">
                <h6>Kekuatan, ketahanan, kebugaran</h6>
                <h2>Semua <em>disini</em></h2>
                <div class="main-button scroll-to-section">
                    <a href="{{ route('register') }}">Daftar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Features Item Start ***** -->
    <section class="section" id="gym-profile">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Profile <em>Gym</em></h2>
                        <img src="{{ asset('images/line-dec.png') }}" alt="waves">
                        <p class="motto">Godzilla Sport didirikan pada tahun 2010 dengan tujuan menyediakan fasilitas kebugaran terbaik bagi komunitas kami. Kami menawarkan berbagai layanan yang dirancang untuk membantu Anda mencapai tujuan kesehatan dan kebugaran Anda.
                            Dengan dukungan trainer yang pprofesional di bidangnya serta fasilitas pelatihan yang lengkap, kami berkomitmen menjadi tempat terbaik untuk membina kesehatan Anda
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Layanan Kami Start ***** -->
    <section class="section" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Pilih <em>Layanan</em></h2>
                        <img src="{{ asset('images/line-dec.png') }}" alt="waves">
                        <p>Nikmati berbagai program layanan kami untuk menunjang gaya hidup sehat anda</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="features-items">
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('images/features-first-icon.png') }}" alt="Basic Fitness">
                            </div>
                            <div class="right-content">
                                <h4>Basic Fitness</h4>
                                <p>Layanan dasar untuk kebugaran tubuh, mencakup penggunaan peralatan gym modern dan area latihan bebas.</p>
                                <p><strong>Fasilitas:</strong> Ruang gym luas, peralatan kebugaran terbaru, loker, dan ruang ganti.</p>
                                <a href="#" class="text-button">Discover More</a>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('images/features-first-icon.png') }}" alt="New Gym Training">
                            </div>
                            <div class="right-content">
                                <h4>New Gym Training</h4>
                                <p>Program latihan gym terbaru dengan panduan dari pelatih profesional, dirancang untuk pemula dan mereka yang ingin memulai gaya hidup sehat.</p>
                                <p><strong>Fasilitas:</strong> Sesi konsultasi dengan pelatih, program latihan personal, dan dukungan nutrisi.</p>
                                <a href="#" class="text-button">Discover More</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="features-items">
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('images/features-first-icon.png') }}" alt="Body Building Course">
                            </div>
                            <div class="right-content">
                                <h4>Body Building Program</h4>
                                <p>Program khusus untuk body building dengan pelatihan intensif dan panduan nutrisi lengkap.</p>
                                <p><strong>Fasilitas:</strong> Area angkat beban berat, sesi pelatihan personal, dan konsultasi gizi.</p>
                                <a href="#" class="text-button">Discover More</a>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('images/features-first-icon.png') }}" alt="Yoga Training">
                            </div>
                            <div class="right-content">
                                <h4>Yoga Training</h4>
                                <p>Kelas yoga untuk berbagai tingkat keahlian yang membantu meningkatkan fleksibilitas dan keseimbangan.</p>
                                <p><strong>Fasilitas:</strong> Studio yoga dengan suasana tenang, matras yoga, dan instruktur berpengalaman.</p>
                                <a href="#" class="text-button">Discover More</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Layanan Kami Ends ***** -->


    <!-- ***** Product Section Starts ***** -->
    <section class="section" id="sewa-alat">
        <div class="container">
            <div class="row product">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Fitness</h2>
                        <img src="{{ asset('images/line-dec.png') }}" alt="waves">
                        <p>Kami menyediakan berbagai peralatan olahraga berkualitas tinggi sesuai dengan kebutuhan Gym Anda</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($products as $product)
                <div class="col-lg-4 card-product">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="{{ asset('storage/product/' . $product->picture) }}" alt="{{ $product->name_product }}">
                        </div>
                        <div class="pi-text">
                            <h6>{{ $product->name_product }}</h6>
                            <p>{{ $product->description }}</p>
                            <p class="harga">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                            <button class="cart-btn"><a href="{{ route('login')}}">Beli Paket</a></button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ***** Product Section Starts ***** -->

    <!-- ***** Call to Action Start ***** -->
    <section class="section mt-5" id="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <h2>Jadilah <em>Motivasi</em> bagi <em>diri sendiri</em>!</h2>
                        <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula, sit amet dapibus odio augue eget libero. Morbi tempus mauris a nisi luctus imperdiet.</p>
                        <div class="main-button scroll-to-section">
                            <a href="{{ route('register') }}">Daftar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Our Classes Start ***** -->
    <section class="section" id="our-classes">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2><em>Kelas</em> Kami</h2>
                        <img src="{{ asset('images/line-dec.png') }}" alt="">
                        <p>Bentuk tubuhmu dan mulai hidup sehat sekarang</p>
                    </div>
                </div>
            </div>
            <div class="row" id="tabs">
              <div class="col-lg-4">
                <ul>
                    @foreach($programs as $program)
                        <li><a href='#tabs-{{ $loop->iteration }}'><img src="{{ asset('images/tabs-first-icon.png') }}" alt="">{{ $program->nama_program }}</a></li>
                    @endforeach
                    <div class="main-rounded-button"><a href="#schedule">Lihat Jadwal</a></div>
                </ul>
              </div>
              <div class="col-lg-8">
                <section class='tabs-content'>
                    @foreach($programs as $program)
                        <article id='tabs-{{ $loop->iteration }}'>
                            <img src="{{ asset('storage/program/' . $program->picture) }}" alt="{{ $program->nama_program }}" class="program-image">
                            <h4>{{ $program->nama_program }}</h4>
                            <p>{{ $program->description }}</p>
                            <div class="main-button">
                                <a href="{{ route('login') }}">Daftar Kelas</a>
                            </div>
                        </article>
                    @endforeach
                </section>
              </div>
            </div>
        </div>
    </section>
    <!-- ***** Our Classes End ***** -->

    <!-- ***** Trainer ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Instruktur <em>Kami</em></h2>
                        <img src="{{ asset('images/line-dec.png') }}" alt="">
                        <p>Kami memiliki Instruktur yang profesional dan berpengalaman di bidangnya, memastikan agar Anda mendapatkan kualitas pelatihan terbaik</p>
                    </div>
                </div>
            </div>
            <div class="row">              
                @foreach($trainers->take(3) as $trainer)
                    <div class="col-lg-4">
                        <div class="trainer-item">
                            <div class="image-thumb">
                                <img src="{{ $trainer->picture ? asset('storage/trainers/' . $trainer->picture) : asset('images/default-trainer.jpg') }}" alt="">
                            </div>
                            <div class="down-content">
                                <span>{{ $trainer->category }}</span>
                                <h4>{{ $trainer->name }}</h4>
                                <p class="card-text">{{ $trainer->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach                  
            </div>
        </div>
    </section>
    <!-- ***** Trainer Ends ***** -->

    <!-- ** Ulasan Section Starts ** -->
    <section class="section" id="ulasan">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="section-heading">Ulasan</h2>
                </div>
            </div>
            <div class="row">
                <div class="scroll-container">
                    @foreach($ulasan as $ulasan)
                    <div class="col-lg-4 review-card">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Rating: 
                                    @for ($i = 0; $i < $ulasan->rating; $i++)
                                        <i class="bx bxs-star star"></i>
                                    @endfor
                                </h5>
                                <p><b>Pengulas: {{ $ulasan->user->name }}</b></p>
                                <p class="card-text">{{ $ulasan->ulasan }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>    
    </section>

    <!-- ** Ulasan Section Ends ** -->

    <!-- ***** Contact Us Area Starts ***** -->
    <section class="section" id="contact-us">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div id="map">
                      <iframe src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="600px" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="contact-form">
                        <form id="contact" action="https://formspree.io/f/mrgnddaw" method="post">
                          <div class="row">
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="name" type="text" id="name" placeholder="Your Name*" required="">
                              </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email*" required="">
                              </fieldset>
                            </div>
                            <div class="col-md-12 col-sm-12">
                              <fieldset>
                                <input name="subject" type="text" id="subject" placeholder="Subject">
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="message" rows="6" id="message" placeholder="Message" required=""></textarea>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" id="form-submit" class="main-button">Send Message</button>
                              </fieldset>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Contact Us Area Ends ***** -->
    
    <section>
        <div class="container medsos">
            <div class="row center">
                <div class="col-lg-12">
                    <ul class="sosmed d-flex">
                        <li>
                            <a href="https://wa.me/085772169307">
                                    <svg class="whatsapp">
                                        <use xlink:href="#whatsapp" />
                                    </svg>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/">
                                    <svg class="instagram">
                                        <use xlink:href="#instagram" />
                                    </svg>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/">
                                <svg class="facebook">
                                    <use xlink:href="#facebook" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/">
                                        <svg class="youtube">
                                            <use xlink:href="#youtube" />
                                        </svg>
                            </a>
                        </li>
                        <li>
                            <a href="https://tiktok.com/">
                                <svg class="tiktok">
                                    <use xlink:href="#tiktok" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; 2024 Kelompok Godzilla FullStack 4 Gamelab Indonesia
                </p>
                    <!-- You shall support us a little via PayPal to info@templatemo.com -->
                    
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="{{ asset('js/jquery-2.1.0.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
                    
    <!-- Plugins -->
    <!-- ScrollReveal -->
    <script src="{{ asset('js/scrollreveal.min.js') }}"></script>

    <!-- Waypoints -->
    <script src="{{ asset('js/waypoints.min.js') }}"></script>

    <!-- CounterUp -->
    <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>

    <!-- ImgFix -->
    <script src="{{ asset('js/imgfix.min.js') }}"></script>

    <!-- MixItUp -->
    <script src="{{ asset('js/mixitup.js') }}"></script>

    <!-- Accordions -->
    <script src="{{ asset('js/accordions.js') }}"></script>

   <!-- Global Init -->
    <script src="{{ asset('js/custom.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const scrollContainer = document.querySelector('.scroll-container');

            // Drag-to-scroll functionality
            let isDown = false;
            let startX;
            let scrollLeft;

            scrollContainer.addEventListener('mousedown', (e) => {
                isDown = true;
                scrollContainer.classList.add('active');
                startX = e.pageX - scrollContainer.offsetLeft;
                scrollLeft = scrollContainer.scrollLeft;
                cancelAnimationFrame(scrollHorizontally); // Stop auto-scrolling when dragging
            });

            scrollContainer.addEventListener('mouseleave', () => {
                isDown = false;
                scrollContainer.classList.remove('active');
            });

            scrollContainer.addEventListener('mouseup', () => {
                isDown = false;
                scrollContainer.classList.remove('active');
            });

            scrollContainer.addEventListener('mousemove', (e) => {
                if (!isDown) return;
                e.preventDefault();
                const x = e.pageX - scrollContainer.offsetLeft;
                const walk = (x - startX) * 2; // The multiplier can be adjusted to change the scroll speed while dragging
                scrollContainer.scrollLeft = scrollLeft - walk;
            });

            // Auto-scroll functionality
            let scrollAmount = 0;
            const scrollStep = 1; // Adjust this value to change the scrolling speed

            function scrollHorizontally() {
                if (!isDown) { // Only auto-scroll if not dragging
                    scrollAmount += scrollStep;
                    if (scrollAmount >= scrollContainer.scrollWidth - scrollContainer.clientWidth) {
                        scrollAmount = 0;
                    }
                    scrollContainer.scrollLeft = scrollAmount;
                }
                requestAnimationFrame(scrollHorizontally);
            }

            scrollHorizontally();
        });

    </script>

</body>
</DOCTYPE>