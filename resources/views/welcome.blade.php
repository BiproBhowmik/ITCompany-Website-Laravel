<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Mamba Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mamba - v2.5.1
  * Template URL: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  @php
  use App\Models\AboutUs;
  use App\Models\Contact;
  use App\Models\Fqna;
  use App\Models\OurService;
  use App\Models\Portfolio;
  use App\Models\OurTeam;
  use App\Models\Slider;


  $about = AboutUs::select('*')->first();
  $contact = Contact::select('*')->first();
  $fqna = Fqna::select('*')->get();
  $service = OurService::select('*')->get();
  $portfolio = Portfolio::select('*')->get();
  $ourTeam = OurTeam::select('*')->get();
  $slider = Slider::select('*')->get();
  @endphp

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <i class="icofont-envelope"></i><a href="mailto:biprobhowmik5@gmail.com">biprobhowmik5@gmail.com</a>
        <i class="icofont-phone"></i> +88 01766 2213 73
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container">

      <div class="logo float-left">
        <h1 class="text-light"><a href=""><span>Mamba</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="{{ route('welcome') }}">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#team">Team</a></li>
          <li><a href="#contact">Contact Us</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          @php
          $sliderFirst = Slider::select('*')->orderby('slId', 'ASC')->first();
          @endphp

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url({{ Storage::url($sliderFirst->slPho) }});">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animate__animated animate__fadeInDown">{{ $sliderFirst->slName }}</h2>
                <p class="animate__animated animate__fadeInUp">{{ $sliderFirst->slDisc }}</p>
              </div>
            </div>
          </div>

          @foreach ($slider as $element)

          @if ($loop->index == 0)
          @continue;
          @endif
          
          <!-- Slide 2 -->
          <div class="carousel-item" style="background-image: url('{{ Storage::url($element->slPho) }}');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animate__animated animate__fadeInDown">{{ $element->slName }}</h2>
                <p class="animate__animated animate__fadeInUp">{{ $element->slDisc }}</p>
              </div>
            </div>
          </div>

          @endforeach
        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon icofont-rounded-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon icofont-rounded-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row no-gutters">
          <div class="col-lg-6 video-box">
            <img width="100%" height="100%" src="{{ Storage::url($about->auPho) }}" class="img-fluid" alt="">
            <a href="{{ $about->auVlink }}" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center about-content">

            <div class="section-title">
              <h2>About Us</h2>
              <p>{!! $about->auText !!}</p>

            </div>
          </div>

        </div>
      </section><!-- End About Us Section -->

      <!-- ======= Counts Section ======= -->
      <section class="counts section-bg">
        <div class="container">

          <div class="row">

            <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up">
              <div class="count-box">
                <i class="icofont-simple-smile" style="color: #20b38e;"></i>
                <span data-toggle="counter-up">232</span>
                <p>Happy Clients</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
              <div class="count-box">
                <i class="icofont-document-folder" style="color: #c042ff;"></i>
                <span data-toggle="counter-up">521</span>
                <p>Projects</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="400">
              <div class="count-box">
                <i class="icofont-live-support" style="color: #46d1ff;"></i>
                <span data-toggle="counter-up">1,463</span>
                <p>Hours Of Support</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="600">
              <div class="count-box">
                <i class="icofont-users-alt-5" style="color: #ffb459;"></i>
                <span data-toggle="counter-up">15</span>
                <p>Hard Workers</p>
              </div>
            </div>

          </div>

        </div>
      </section><!-- End Counts Section -->

      <!-- ======= Services Section ======= -->
      <section id="services" class="services">
        <div class="container">

          <div class="section-title">
            <h2>Services</h2>
          </div>

          <div class="row">
            @foreach ($service as $element)
            <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up">
              <div class="icon"><img class="img-circle img-thumbnail" alt="profile-image" src="{{ Storage::url($element->osPho) }}" width="20%"></div>
              <h4 class="title">{{ $element->osTitle }}</a></h4>
              <p class="description">{{ $element->osDisc }}</p>
            </div>
            @endforeach
          </div>

        </div>
      </section><!-- End Services Section -->

      <!-- ======= Our Portfolio Section ======= -->
      <section id="portfolio" class="portfolio section-bg">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

          <div class="section-title">
            <h2>Our Portfolio</h2>
          </div>

          

          <div class="row portfolio-container">

            @foreach ($portfolio as $element)
            
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <img src="{{ Storage::url($element->prPho) }}" class="img-fluid" alt="" width="100%">
                <div class="portfolio-info">
                  <h4>{{ $element->prTitle }}</h4>
                  <div class="portfolio-links">
                    <a href="{{ $element->prLink }}" title="More Details"><i class="icofont-external-link"></i></a>
                  </div>
                </div>
              </div>
            </div>

            @endforeach
          </div>

        </div>
      </section><!-- End Our Portfolio Section -->

      <!-- ======= Our Team Section ======= -->
      <section id="team" class="team">
        <div class="container">

          <div class="section-title">
            <h2>Our Team</h2>
          </div>

          <div class="row">


            @foreach ($ourTeam as $element)
            {{-- expr --}}

            <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
              <div class="member">
                <div class="pic"><img width="100%" src="{{ Storage::url($element->tmPho) }}" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4>{{ $element->tmName }}</h4>
                  <span>{{ $element->tmPosition }}</span>
                  <div class="social">
                    <a href="{{ $element->tmFbLink }}"><i class="icofont-facebook"></i></a>
                    <a href="{{ $element->tmLnLink }}"><i class="icofont-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>

            @endforeach
          </div>

        </div>
      </section><!-- End Our Team Section -->

      <!-- ======= Frequently Asked Questions Section ======= -->
      <section id="faq" class="faq section-bg">
        <div class="container">

          <div class="section-title">
            <h2>Frequently Asked Questions</h2>
          </div>

          <div class="row  d-flex align-items-stretch">

            @foreach ($fqna as $element)
            {{-- expr --}}

            <div class="col-lg-6 faq-item" data-aos="fade-up">
              <h4>{{ $element->fQnaQ }}</h4>
              <p>{{ $element->fQnaA }}</p>
            </div>

            @endforeach
          </div>

        </div>
      </section><!-- End Frequently Asked Questions Section -->

      <!-- ======= Contact Us Section ======= -->
      <section id="contact" class="contact">
        <div class="container">

          <div class="section-title">
            <h2>Contact Us</h2>
          </div>

          <div class="row">

            <div class="col-lg-6 d-flex align-items-stretch" data-aos="fade-up">
              <div class="info-box">
                <i class="bx bx-map"></i>
                <h3>Our Address</h3>
                <p>{{ $contact->contAdd }}</p>
              </div>
            </div>

            <div class="col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
              <div class="info-box">
                <i class="bx bx-envelope"></i>
                <h3>Email Us</h3>
                <p>{{ $contact->contEmail }}</p>
              </div>
            </div>

            <div class="col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
              <div class="info-box ">
                <i class="bx bx-phone-call"></i>
                <h3>Call Us</h3>
                <p>{{ $contact->contPho }}</p>
              </div>
            </div>

            <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
              <form action="" method="POST" {{-- class="php-email-form" --}} id="commonMessageForm">
                @csrf
                
                <div class="form-row">
                  <div class="col-lg-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                  </div>
                  <div class="col-lg-6 form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validate"></div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validate"></div>
                </div>
                <div class="form-group">
                  <textarea id="message" class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validate"></div>
                </div>
                <div class="mb-3">
                  <div style="display: none;" class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div style="display: none;" id="sent-message" class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button style="background: #428bca;
                border: 0;
                padding: 10px 24px;
                color: #fff;
                transition: 0.4s;
              }" type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Us Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Bipro</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/ -->
        Designed by <a href="https://fb/biprojoy/">Bipro</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  @include('backend.myAjax.ajaxMessage')

</body>

</html>