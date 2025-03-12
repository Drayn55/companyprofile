<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">

  <div class="container">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center">
        <h1 data-aos="fade-up">Creative Solutions for Your Legal Problems</h1>
        <h2 data-aos="fade-up" data-aos-delay="400">Creative Solutions for Your Legal Problems</h2>
        <div data-aos="fade-up" data-aos-delay="600">
          <div class="text-center text-lg-start">
            <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
              <span>Get Started</span>
              <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="col-lg-6 hero-img overflow-hidden rounded-4" data-aos="zoom-out" data-aos-delay="200">
        <img src="<?= base_url() ?>vendor/front-end/assets/img/hero-img.jpg" class="img-fluid" alt="">
      </div>
    </div>
  </div>

</section><!-- End Hero -->

<main id="main">
  <!-- ======= About Section ======= -->
  <section id="about" class="about">

    <div class="container" data-aos="fade-up">
      <div class="row gx-0">

        <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
          <div class="content card">
            <h3>Our Firm</h3>
            <p>
              <?= $setting->profile; ?>
            </p>
            <div class="text-center text-lg-start">
              <a href="#" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Read More</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
          <img src="<?= base_url(); ?>vendor/front-end/assets/img/hero-img-2.jpg" class="img-fluid" alt="">
        </div>

      </div>
    </div>

  </section><!-- End About Section -->

  <!-- ======= Values Section ======= -->
  <section id="values" class="values">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Our Values</h2>
        <hr>
        <p>We always provide quality legal services <br> with full dedication and competence.</p>
      </header>

      <div class="row">

        <div class="col-lg-4">
          <div class="box" data-aos="fade-up" data-aos-delay="200">
            <img src="<?= base_url(); ?>vendor/front-end/assets/img/values-1.png" class="img-fluid" alt="">
            <h3>Professionalism in Service.</h3>
            <p>We provide high quality legal services with dedication, responsibility, and based on expertise and experience to ensure our clients' legal interests are protected.</p>
          </div>
        </div>

        <div class="col-lg-4 mt-4 mt-lg-0">
          <div class="box" data-aos="fade-up" data-aos-delay="400">
            <img src="<?= base_url(); ?>vendor/front-end/assets/img/values-2.png" class="img-fluid" alt="">
            <h3>Caring for Society</h3>
            <p>We understand that law is not just about rules, but also about humanity, so we are committed to providing legal assistance and protection to those in need with empathy and social responsibility.</p>
          </div>
        </div>

        <div class="col-lg-4 mt-4 mt-lg-0">
          <div class="box" data-aos="fade-up" data-aos-delay="600">
            <img src="<?= base_url(); ?>vendor/front-end/assets/img/values-3.png" class="img-fluid" alt="">
            <h3>Courage in Upholding Justice</h3>
            <p>We are not afraid to face legal challenges and are always ready to fight for individual rights and justice in every situation, even when facing various obstacles and pressures.</p>
          </div>
        </div>

      </div>

    </div>

  </section><!-- End Values Section -->

  <!-- ======= Counts Section ======= -->
  <section id="counts" class="counts">
    <div class="container" data-aos="fade-up">

      <div class="row gy-4">

        <div class="col-lg-3 col-md-6">
          <div class="count-box">
            <i class="bi bi-emoji-smile"></i>
            <div>
              <span data-purecounter-start="0" data-purecounter-end="<?= $this->M_dashboard->client()->total; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Happy Clients</p>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="count-box">
            <i class="bi bi-journal-richtext" style="color: #ee6c20;"></i>
            <div>
              <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
              <p>Projects</p>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="count-box">
            <i class="bi bi-headset" style="color: #15be56;"></i>
            <div>
              <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
              <p>Hours Of Support</p>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="count-box">
            <i class="bi bi-people" style="color: #bb0852;"></i>
            <div>
              <span data-purecounter-start="0" data-purecounter-end="<?= $this->M_dashboard->staff()->total; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Hard Workers</p>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Counts Section -->

  <!-- ======= Features Section ======= -->
  <section id="features" class="features">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Our Client & Success Stories</h2>
        <hr>
        <p>We have successfully handled various high-profile cases across Indonesia, including:
          </p>
      </header>

      <div class="row">

        <div class="col-lg-6">
          <img src="<?= base_url(); ?>vendor/front-end/assets/img/features.png" class="img-fluid" alt="">
        </div>

        <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
          <div class="row align-self-center gy-4">

            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200">
              <div class="feature-box d-flex align-items-center">
                <i class="bi bi-check"></i>
                <h3>
                Winning pretrial motions to annul wrongful suspect designations</h3>
              </div>
            </div>

            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="300">
              <div class="feature-box d-flex align-items-center">
                <i class="bi bi-check"></i>
                <h3>Securing favorable court verdicts in corporate disputes</h3>
              </div>
            </div>

            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="400">
              <div class="feature-box d-flex align-items-center">
                <i class="bi bi-check"></i>
                <h3>Representing businesses in environmental law, tax, and customs cases</h3>
              </div>
            </div>

            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="500">
              <div class="feature-box d-flex align-items-center">
                <i class="bi bi-check"></i>
                <h3>From individuals to large corporations, we are trusted by a diverse range of clients for our strategic legal approach and commitment to justice.</h3>
              </div>
            </div>

            <!-- <div class="col-md-6" data-aos="zoom-out" data-aos-delay="600">
              <div class="feature-box d-flex align-items-center">
                <i class="bi bi-check"></i>
                <h3>Alias possimus</h3>
              </div>
            </div> -->

            <!-- <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700">
              <div class="feature-box d-flex align-items-center">
                <i class="bi bi-check"></i>
                <h3>Repellendus mollitia</h3>
              </div>
            </div> -->

          </div>
        </div>

      </div> <!-- / row -->

      <!-- Feature Tabs -->
      <div class="row feture-tabs" data-aos="fade-up">
        <div class="col-lg-6">
          <h3>Visi, Misi, & Sejarah Perusahaan</h3>

          <!-- Tabs -->
          <ul class="nav nav-pills mb-3">
            <li>
              <a class="nav-link active" data-bs-toggle="pill" href="#tab1">Visi</a>
            </li>
            <li>
              <a class="nav-link" data-bs-toggle="pill" href="#tab2">Misi</a>
            </li>
            <li>
              <a class="nav-link" data-bs-toggle="pill" href="#tab3">Sejarah</a>
            </li>
          </ul><!-- End Tabs -->

          <!-- Tab Content -->
          <div class="tab-content">

            <div class="card card-info tab-pane fade show active" id="tab1">
              <p class=""><?= $setting->visi; ?></p>
            </div><!-- End Tab 1 Content -->

            <div class="card card-success tab-pane fade show" id="tab2">
              <p class=""><?= $setting->misi; ?></p>
            </div><!-- End Tab 2 Content -->

            <div class="card card-warning tab-pane fade show" id="tab3">
              <p class=""><?= $setting->sejarah; ?></p>
            </div><!-- End Tab 3 Content -->

          </div>

        </div>

        <div class="col-lg-6">
          <img src="<?= base_url(); ?>vendor/front-end/assets/img/features-2.png" class="img-fluid" alt="">
        </div>

      </div><!-- End Feature Tabs -->

      <!-- Feature Icons -->
      <!-- <div class="row feature-icons" data-aos="fade-up">
        <h3>Ratione mollitia eos ab laudantium rerum beatae quo</h3>

        <div class="row">

          <div class="col-xl-4 text-center" data-aos="fade-right" data-aos-delay="100">
            <img src="<?= base_url(); ?>vendor/front-end/assets/img/features-3.png" class="img-fluid p-4" alt="">
          </div>

          <div class="col-xl-8 d-flex content">
            <div class="row align-self-center gy-4">

              <div class="col-md-6 icon-box" data-aos="fade-up">
                <i class="ri-line-chart-line"></i>
                <div>
                  <h4>Corporis voluptates sit</h4>
                  <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                </div>
              </div>

              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                <i class="ri-stack-line"></i>
                <div>
                  <h4>Ullamco laboris nisi</h4>
                  <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                </div>
              </div>

              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                <i class="ri-brush-4-line"></i>
                <div>
                  <h4>Labore consequatur</h4>
                  <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                </div>
              </div>

              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                <i class="ri-magic-line"></i>
                <div>
                  <h4>Beatae veritatis</h4>
                  <p>Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta</p>
                </div>
              </div>

              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                <i class="ri-command-line"></i>
                <div>
                  <h4>Molestiae dolor</h4>
                  <p>Et fuga et deserunt et enim. Dolorem architecto ratione tensa raptor marte</p>
                </div>
              </div>

              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
                <i class="ri-radar-line"></i>
                <div>
                  <h4>Explicabo consectetur</h4>
                  <p>Est autem dicta beatae suscipit. Sint veritatis et sit quasi ab aut inventore</p>
                </div>
              </div>

            </div>
          </div>

        </div>

      </div> -->
      <!-- End Feature Icons -->

    </div>

  </section>
  <!-- End Features Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Services</h2>
        <p>Busur Trisula & Partner Specialist</p>
      </header>

      <div class="row gy-4">
        <?php foreach ($layanan as $key => $value) :

          if ($value->status_layanan == "Publish") : ?>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
              <div class="service-box blue">
                <div class="post-img"> <img src="<?= base_url('assets/img/layanan/') . $value->gambar_layanan; ?>" alt="" class="img-fluid rounded " style="height: 100px; width:100px;">
                </div>
                <h3 class="mt-4"><?= $value->judul_layanan; ?></h3>
                <a href="<?= base_url('home/detaillayanan/' . $value->slug_layanan); ?>" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>

      </div>

    </div>

  </section><!-- End Services Section -->

  <!-- ======= F.A.Q Section ======= -->
  <section id="faq" class="faq">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>F.A.Q</h2>
        <p>Frequently Asked Questions</p>
      </header>

      <div class="row">
        <div class="col-lg-6">
          <!-- F.A.Q List 1-->
          <div class="accordion accordion-flush" id="faqlist1">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                What services are available on this website?
                </button>
              </h2>
              <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                <div class="accordion-body">
                This website provides legal information, legal consultations, regulations, and the latest legal news.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                Can I get free legal consultation?
                </button>
              </h2>
              <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                <div class="accordion-body">
                Some consultation services are available for free, but more complex cases may require a fee.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                How can I contact a lawyer through this website?
                </button>
              </h2>
              <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                <div class="accordion-body">
                You can contact a lawyer through the contact form or chat feature available on our website.
                </div>
              </div>
            </div>

          </div>
        </div>

        <div class="col-lg-6">

          <!-- F.A.Q List 2-->
          <div class="accordion accordion-flush" id="faqlist2">

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-1">
                What types of legal cases can be consulted?
                </button>
              </h2>
              <div id="faq2-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                <div class="accordion-body">
                We handle various cases, including civil law, criminal law, business law, property law, family law, and intellectual property rights.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-2">
                Is the legal information on this website regularly updated?
                </button>
              </h2>
              <div id="faq2-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                <div class="accordion-body">
                Yes, we strive to update legal information to ensure compliance with the latest regulations.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-3">
                Are legal services available in all regions?
                </button>
              </h2>
              <div id="faq2-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                <div class="accordion-body">
                We operate nationally and provide legal services in various regions according to applicable regulations.
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>

    </div>

  </section><!-- End F.A.Q Section -->

  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Portfolio</h2>
        <p>Check our latest work</p>
      </header>

      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-app">Criminal Law</li>
            <li data-filter=".filter-card">Custom Law</li>
            <li data-filter=".filter-web">Civil law</li>
          </ul>
        </div>
      </div>

      <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

        <?php foreach ($portfolio as $key => $value) :
          // strip tags to avoid breaking any html
          if ($value->nama_layanan == " App Development" && $value->status_portfolio == "Publish") : ?>
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <img src="<?= base_url('assets/img/portfolio/') . $value->gambar_portfolio; ?>" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4><?= $value->judul_portfolio; ?></h4>
                  <p><?= $value->nama_layanan; ?></p>
                  <div class="portfolio-links">
                    <a href="<?= base_url('assets/img/portfolio/') . $value->gambar_portfolio; ?>" data-gallery="portfolioGallery" class="portfokio-lightbox" title="<?= $value->judul_portfolio; ?>"><i class="bi bi-plus"></i></a>
                    <a href="<?= base_url('home/portfoliodetail/' . $value->slug_portfolio); ?>" title="More Details"><i class="bi bi-link"></i></a>
                  </div>
                </div>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>

        <?php foreach ($portfolio as $key => $value) :
          // strip tags to avoid breaking any html
          if ($value->nama_layanan == " Web Development" && $value->status_portfolio == "Publish") : ?>
            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <div class="portfolio-wrap">
                <img src="<?= base_url('assets/img/portfolio/') . $value->gambar_portfolio; ?>" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4><?= $value->judul_portfolio; ?></h4>
                  <p><?= $value->nama_layanan; ?></p>
                  <div class="portfolio-links">
                    <a href="<?= base_url('assets/img/portfolio/') . $value->gambar_portfolio; ?>" data-gallery="portfolioGallery" class="portfokio-lightbox" title="<?= $value->judul_portfolio; ?>"><i class="bi bi-plus"></i></a>
                    <a href="<?= base_url('home/portfoliodetail/' . $value->slug_portfolio); ?>" title="More Details"><i class="bi bi-link"></i></a>
                  </div>
                </div>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>

        <?php foreach ($portfolio as $key => $value) :
          // strip tags to avoid breaking any html
          if ($value->nama_layanan == "Web Design" && $value->status_portfolio == "Publish") : ?>
            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <div class="portfolio-wrap">
                <img src="<?= base_url('assets/img/portfolio/') . $value->gambar_portfolio; ?>" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4><?= $value->judul_portfolio; ?></h4>
                  <p><?= $value->nama_layanan; ?></p>
                  <div class="portfolio-links">
                    <a href="<?= base_url('assets/img/portfolio/') . $value->gambar_portfolio; ?>" data-gallery="portfolioGallery" class="portfokio-lightbox" title="<?= $value->judul_portfolio; ?>"><i class="bi bi-plus"></i></a>
                    <a href="<?= base_url('home/portfoliodetail/' . $value->slug_portfolio); ?>" title="More Details"><i class="bi bi-link"></i></a>
                  </div>
                </div>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>

      </div>

    </div>

  </section><!-- End Portfolio Section -->

  <!-- ======= Testimonials Section ======= -->
  <section id="testimonials" class="testimonials">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Testimonials</h2>
        <p>What they are saying about us</p>
      </header>

      <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="200">
        <div class="swiper-wrapper ">
          <?php foreach ($portfolio as $key => $value) :
            // strip tags to avoid breaking any html
            $isi = strip_tags($value->testimoni);
            if (strlen($isi) > 200) {

              // truncate isi
              $isiCut = substr($isi, 0, 200);
              $endPoint = strrpos($isiCut, ' ');

              //if the isi doesn't contain any space then it will cut without word basis.
              $isi = $endPoint ? substr($isiCut, 0, $endPoint) : substr($isiCut, 0);
            }
            if ($value->status_portfolio == "Publish") : ?>
              <div class="swiper-slide">
                <div class="card testimonial-item ">
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <?= $isi; ?>
                  </p>
                  <div class="profile mt-auto">
                    <img src="<?= base_url('assets/img/portfolio/') . $value->gambar_portfolio; ?>" class="testimonial-img" alt="">
                    <h3><?= $value->judul_portfolio; ?></h3>
                    <h4><?= $value->nama_layanan; ?></h4>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          <?php endforeach; ?>
          <!-- End testimonial item -->

        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>

  </section><!-- End Testimonials Section -->

  <!-- ======= Team Section ======= -->
  <section id="team" class="team">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Team</h2>
        <p>Our hard working team</p>
      </header>
      <div class="row gy-4 d-flex justify-content-center">
        <?php foreach ($staff as $key => $value) :
          if ($value->publish == "Publish") : ?>

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
              <div class="member">
                <div class="member-img">
                  <img src="<?= base_url('assets/img/staff/') . $value->gambar_staff; ?>" class="img-fluid" alt="">
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4><?= $value->nama_staff; ?></h4>
                  <span><?= $value->nama_kategori; ?></span>
                  <p><?= $value->no_telepon; ?></p>
                </div>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>

    </div>

  </section><!-- End Team Section -->

  <!-- ======= Clients Section ======= -->
  <section id="clients" class="clients">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Our Clients</h2>
        <p>Our Retainer Clients</p>
      </header>

      <div class="clients-slider swiper-container">
        <div class="swiper-wrapper align-items-center">
          <?php foreach ($client as $key => $value) :
            if ($value->publish == "Publish") : ?>
              <div class="swiper-slide">
                <img src="<?= base_url('assets/img/client/') . $value->gambar_client; ?>" class="img-fluid" alt="">
              </div>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>

  </section><!-- End Clients Section -->

  <!-- ======= Recent Blog Posts Section ======= -->
  <section id="recent-blog-posts" class="recent-blog-posts">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Blog</h2>
        <p>Recent posts form our Blog</p>
      </header>

      <div class="row">
        <?php foreach ($berita as $key => $value) :
          // strip tags to avoid breaking any html
          $isi = strip_tags($value->isi_berita);
          if (strlen($isi) > 200) {

            // truncate isi
            $isiCut = substr($isi, 0, 200);
            $endPoint = strrpos($isiCut, ' ');

            //if the isi doesn't contain any space then it will cut without word basis.
            $isi = $endPoint ? substr($isiCut, 0, $endPoint) : substr($isiCut, 0);
          }
          if ($value->status_berita == "Publish") : ?>
            <div class="col-lg-4 mb-2">
              <div class="post-box">
                <div class="post-img"><img src="<?= base_url('assets/img/berita/') . $value->gambar_berita; ?>" class="img-thumbnail" alt=""></div>
                <span class="post-date"><?= date('d-M-Y', strtotime($value->date_cretated)); ?></span>
                <h3 class="post-title"><?= $value->judul_berita; ?></h3>
                <a href="<?= base_url('home/detail/' . $value->slug_berita); ?>" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>

      </div>

    </div>

  </section><!-- End Recent Blog Posts Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Contact</h2>
        <p>Contact Us</p>
      </header>

      <div class="row gy-4">

        <div class="col-lg-6">

          <div class="row gy-4">
            <div class="col-md-6">
              <div class="info-box">
                <i class="bi bi-geo-alt"></i>
                <h3>Address</h3>
                <p><?= $setting->alamat; ?></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box">
                <i class="bi bi-telephone"></i>
                <h3>Call Us</h3>
                <p><?= $setting->no_telepon; ?><br><?= $setting->no_telepon; ?></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box">
                <i class="bi bi-envelope"></i>
                <h3>Email Us</h3>
                <p><?= $setting->email; ?><br><?= $setting->email; ?></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box">
                <i class="bi bi-clock"></i>
                <h3>Open Hours</h3>
                <p>Monday - Friday<br>9:00AM - 05:00PM</p>
              </div>
            </div>
          </div>

        </div>

        <div class="col-lg-6">
          <form action="forms/contact.php" method="post" class="php-email-form">
            <div class="row gy-4">

              <div class="col-md-6">
                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
              </div>

              <div class="col-md-6 ">
                <input type="email" class="form-control" name="email" placeholder="Your Email" required>
              </div>

              <div class="col-md-12">
                <input type="text" class="form-control" name="subject" placeholder="Subject" required>
              </div>

              <div class="col-md-12">
                <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
              </div>

              <div class="col-md-12 text-center">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>

                <button type="submit">Send Message</button>
              </div>

            </div>
          </form>

        </div>

      </div>

    </div>

  </section><!-- End Contact Section -->

</main><!-- End #main -->