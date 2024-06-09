<DOCTYPE HTML>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Kelompok 3 Godzilla FullStack 4">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

  <title>User Gym and Court App</title>

  <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">

    <link rel="stylesheet" href="{{ asset('css/templatemo-training-studio.css') }}">

    <style>
        p.motto {
            text-align: justify;
        }

        .star 
        {
            color:orange;
        }

        .court {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
    </style>

</head>

<body>

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
                            <li class="scroll-to-section"><a href="#sewa-alat">Produk</a></li>
                            <li class="scroll-to-section"><a href="#our-classes">Kelas</a></li>
                            <li class="scroll-to-section"><a href="#contact-us">Ulasan</a></li>
                            <li class="scroll-to-section"><a href="{{ route('user.pesanan') }}">Pesanan</a></li> 
                            <li class="main-button">
                                <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            Log Out
                                        </x-dropdown-link>
                                </form>
                            </button>
                            </li>
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
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->


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
                                <p class="harga mb-3">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                                <a href="{{ url('/order?product_id=' . $product->id_product) }}" class="add-to-cart-btn">Beli Paket</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ***** Product Section Ends ***** -->

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
                    <div class="main-rounded-button"><a href="{{ url('/schedule')}}">Lihat Jadwal</a></div>
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
                                <a href="{{ url('/booking?program_id=' . $program->id_program) }}">Daftar Kelas</a>
                            </div>
                        </article>
                    @endforeach
                </section>
              </div>
            </div>
        </div>
    </section>
    <!-- ***** Our Classes End ***** -->

    <!-- ***** Ulasan Starts ***** -->
    <!-- ** Ulasan Starts ** -->
    <section class="section" id="contact-us">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12 mx-auto">
                    <div class="contact-form">
                        <h2 style="text-align: center; color:white; margin-bottom:30px;">Masukkan Ulasanmu!!</h2>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form id="contact" action="{{ route('ulasan.store') }}" method="post">
                            @csrf
                            <div class="rating">
                                <input type="number" name="rating" id="rating-input" hidden>
                                <i class="bx bx-star star" style="--i: 0;" data-value="1"></i>
                                <i class="bx bx-star star" style="--i: 1;" data-value="2"></i>
                                <i class="bx bx-star star" style="--i: 2;" data-value="3"></i>
                                <i class="bx bx-star star" style="--i: 3;" data-value="4"></i>
                                <i class="bx bx-star star" style="--i: 4;" data-value="5"></i>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <textarea name="ulasan" rows="6" id="ulasan" placeholder="Ulasan Anda" required class="@error('ulasan') is-invalid @enderror"></textarea>
                                    @error('ulasan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="main-button">Bagikan Ulasan</button>
                                </fieldset>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ** Ulasan Ends ** -->

    </section>
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; 2024 Kelompok Godzilla
                FullStack 4 Gamelab Indonesia
                </p>
                    <!-- You shall support us a little via PayPal to info@templatemo.com -->
                    
                </div>
            </div>
        </div>
    </footer>

    <!-- Rating Star -->
    <script src="{{ asset('js/rating.js') }}"></script>

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
        document.addEventListener('DOMContentLoaded', (event) => {
            const stars = document.querySelectorAll('.star');
            const ratingInput = document.getElementById('rating-input');

            stars.forEach((star, index) => {
                star.addEventListener('click', () => {
                    ratingInput.value = star.getAttribute('data-value');
                    stars.forEach((s, i) => {
                        if (i <= index) {
                            s.classList.remove('bx-star');
                            s.classList.add('bxs-star');
                        } else {
                            s.classList.remove('bxs-star');
                            s.classList.add('bx-star');
                        }
                    });
                });
            });

            @if ($errors->any())
                window.location.hash = '#contact-us';
            @endif
        });
    </script>

</body>
</DOCTYPE>