<DOCTYPE HTML>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Kelompok 3 Godzilla FullStack 4">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

  <title>Member Gym and Court App</title>

  <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">

    <link rel="stylesheet" href="{{ asset('css/templatemo-training-studio.css') }}">

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
                        <a href="{{ url('/dashboard') }}" class="logo">Training<em> Studio</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Beranda</a></li>
                            <li class="scroll-to-section"><a href="#sewa-alat">Produk</a></li>
                            <li class="scroll-to-section"><a href="#our-classes">Kelas</a></li>
                            <li class="scroll-to-section"><a href="#contact-us">Ulasan</a></li>
                            <li class="scroll-to-section"><a href="{{ url('/member') }}">My-Member</a></li> 
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
                
            </div>
        </div>
    </section>
    <!-- ***** Product Section Starts ***** -->

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
                  <li><a href='#tabs-1'><img src="{{ asset('images/tabs-first-icon.png') }}" alt="">Fitness Class</a></li>
                  <li><a href='#tabs-2'><img src="{{ asset('images/tabs-first-icon.png') }}" alt="">Body Building</a></a></li>
                  <li><a href='#tabs-3'><img src="{{ asset('images/tabs-first-icon.png') }}" alt="">Yoga Training</a></a></li>
                  <div class="main-rounded-button"><a href="#schedule">Lihat Jadwal</a></div>
                </ul>
              </div>
              <div class="col-lg-8">
                <section class='tabs-content'>
                  <article id='tabs-1'>
                    <img src="{{ asset('images/training-image-03.jpg') }}" alt="First Class">
                    <h4>Fitness Class</h4>
                    <p>Kelas ini bertujuan untuk membangun fisik dan jiwa yang sehat, dengan berbagai latihan fisik dan pembimbingan cara hidup dan nutrisi dari trainer berpengalaman</p>
                    <div class="main-button">
                        <a href="#">Daftar Kelas</a>
                    </div>
                  </article>
                  <article id='tabs-2'>
                    <img src="{{ asset('images/training-image-01.jpg') }}" alt="Third Class">
                    <h4>Body Building Class</h4>
                    <p>Kelas ini bertujuan untuk membentuk tubuh impian anda, dengan berbagai latihan fisik yang terstruktur dan dibimbing oleh trainer berpengalaman</p>
                    <div class="main-button">
                        <a href="#">Daftar Kelas</a>
                    </div>
                  </article>
                  <article id='tabs-3'>
                    <img src="{{ asset('images/training-image-04.jpg') }}" alt="Fourth Training">
                    <h4>Yoga Training Class</h4>
                    <p>Kelas ini bertujuan meningkatkan kekuatan tubuh, mengurangi stres, menjaga berat badan ideal dan menjaga kesehatan diri</p>
                    <div class="main-button">
                        <a href="#">Daftar Kelas</a>
                    </div>
                  </article>
                </section>
              </div>
            </div>
        </div>
    </section>
    <!-- ***** Our Classes End ***** -->

    <section class="section" id="schedule">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading dark-bg">
                        <h2>Jadwal <em>Kelas</em></h2>
                        <img src="{{ asset('images/line-dec.png') }}" alt="">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellat nam similique quis quod tempora, deleniti atque omnis illo, excepturi adipisci, itaque placeat dicta eligendi vero repudiandae officia obcaecati veniam minus.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="filters">
                        <ul class="schedule-filter">
                            <li class="active" data-tsfilter="monday">Monday</li>
                            <li data-tsfilter="tuesday">Tuesday</li>
                            <li data-tsfilter="wednesday">Wednesday</li>
                            <li data-tsfilter="thursday">Thursday</li>
                            <li data-tsfilter="friday">Friday</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-10 offset-lg-1">
                    <div class="schedule-table filtering">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="day-time">Fitness Class</td>
                                    <td class="monday ts-item show" data-tsmeta="monday">10:00AM - 11:30AM</td>
                                    <td class="tuesday ts-item" data-tsmeta="tuesday">2:00PM - 3:30PM</td>
                                    <td>William G. Stewart</td>
                                </tr>
                                <tr>
                                    <td class="day-time">Muscle Training</td>
                                    <td class="friday ts-item" data-tsmeta="friday">10:00AM - 11:30AM</td>
                                    <td class="thursday friday ts-item" data-tsmeta="thursday" data-tsmeta="friday">2:00PM - 3:30PM</td>
                                    <td>Paul D. Newman</td>
                                </tr>
                                <tr>
                                    <td class="day-time">Body Building</td>
                                    <td class="tuesday ts-item" data-tsmeta="tuesday">10:00AM - 11:30AM</td>
                                    <td class="monday ts-item show" data-tsmeta="monday">2:00PM - 3:30PM</td>
                                    <td>Boyd C. Harris</td>
                                </tr>
                                <tr>
                                    <td class="day-time">Yoga Training Class</td>
                                    <td class="wednesday ts-item" data-tsmeta="wednesday">10:00AM - 11:30AM</td>
                                    <td class="friday ts-item" data-tsmeta="friday">2:00PM - 3:30PM</td>
                                    <td>Hector T. Daigle</td>
                                </tr>
                                <tr>
                                    <td class="day-time">Advanced Training</td>
                                    <td class="thursday ts-item" data-tsmeta="thursday">10:00AM - 11:30AM</td>
                                    <td class="wednesday ts-item" data-tsmeta="wednesday">2:00PM - 3:30PM</td>
                                    <td>Bret D. Bowers</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Ulasan Starts ***** -->
    <section class="section" id="contact-us">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12 mx-auto">
                    <div class="contact-form">
                    <h2 style="text-align: center; color:white; margin-bottom:30px;">Masukkan Ulasanmu!!</h2>
                        <form id="contact" action="{{ route('ulasan.store') }}" method="post">
                            @csrf
                            <div class="rating">
                                <input type="number" name="rating" hidden>
                                <i class="bx bx-star star" style="--i: 0;"></i>
                                <i class="bx bx-star star" style="--i: 1;"></i>
                                <i class="bx bx-star star" style="--i: 2;"></i>
                                <i class="bx bx-star star" style="--i: 3;"></i>
                                <i class="bx bx-star star" style="--i: 4;"></i>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="ulasan" rows="6" id="ulasan" placeholder="Ulasan Anda" required=""></textarea>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" id="form-submit" class="main-button">Bagikan Ulasan</button>
                              </fieldset>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Ulasan Ends ***** -->

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
</body>
</DOCTYPE>