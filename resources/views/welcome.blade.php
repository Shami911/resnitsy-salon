@extends('layout')




<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container position-relative">
        @foreach($nav as $item)
        <h1>{{$item->title}}</h1>
        <h2>{{$item->slogan}}</h2>
        <a href="#about" class="btn-get-started scrollto">{{$item->button}}</a>
    </div>
    @endforeach
</section>
<!-- End Hero -->

<main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
        <div class="container">

            <div class="row">

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="{{$item->icon}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- End Clients Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="row">
                @foreach ($img as $item)
                <div class="col-lg-6">
                    <img src="/storage/ImgAbout/{{$item->img}}" class="col-12 col-lg-10" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                    <h3>{{$item->title}}</h3>
                    <p>
                        {{$item->description}}
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <i class="bx bx-receipt"></i>
                            <h4> {{$item->slogatLeft}}</h4>
                            <p>{{$item->descriptionSL}}</p>
                        </div>
                        <div class="col-md-6">
                            <i class="bx bx-cube-alt"></i>
                            <h4>{{$item->slogatRight}}</h4>
                            <p>{{$item->descriptionSR}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
        <div class="container">

            <div class="row counters">
                @foreach ($count as $item)

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="{{$item->SloganClients}}" data-purecounter-duration="1" class="purecounter"></span>
                    <p>{{$item->Clients}}</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="{{$item->SloganProjects}}" data-purecounter-duration="1" class="purecounter"></span>
                    <p>{{$item->Projects}}</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="{{$item->SloganSupport}}" data-purecounter-duration="1" class="purecounter"></span>
                    <p>{{$item->Support}}</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="{{$item->SloganWorkers}}" data-purecounter-duration="1" class="purecounter"></span>
                    <p>{{$item->HardWorkers}}</p>
                </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- End Counts Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">
            @foreach($title_service as $item)


            <div class="section-title">
                <h2>{{$item->title}}</h2>
                <p>{{$item->slogan}}</p>
            </div>
            @endforeach
            <div class="row">
                @foreach($service as $item)
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box iconbox-blue" style="width: 430px">
                        <div class="icon">
                            <i class="{{$item->icon}}"></i>
                        </div>
                        <h4><a href="">{{$item->title}}</a></h4>
                        <p>{{$item->slogan}}</p>
                    </div>
                </div>
                @endforeach
            </div>
    </section>
    <!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container">
            @foreach($section as $item)
            <div class="text-center">
                <h3>{{$item->title}}</h3>
                <p>{{$item->slogan}}</p>
                <a class="cta-btn" href="#">{{$item->button}}</a>
            </div>

        </div>
        @endforeach
    </section>
    <!-- End Cta Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container">
            @foreach($reviews as $item)
            <div class="section-title">



                <h2>{{$item->title}}</h2>
                <p>{{$item->slogan}}</p>
            </div>
            @endforeach
            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">
                    @foreach($comment as $item)
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>{{$item->comment}}
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            <img src="/storage/Comment/{{$item->img}}" class="testimonial-img" alt="">
                            <h3>{{$item->name}}</h3>
                            <h4>{{$item->work}}</h4>
                        </div>
                    </div>
                    <!-- End testimonial item -->
                    @endforeach

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section>
    <!-- End Testimonials Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="section-title">
                <h2>Portfolio</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi
                    quidem hic quas.</p>
            </div>

            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-app">App</li>
                        <li data-filter=".filter-card">Card</li>
                        <li data-filter=".filter-web">Web</li>
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container">

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>App 1</h4>
                        <p>App</p>
                        <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" data-gallery="portfolioDetailsGallery" data-glightbox="type: external" class="portfolio-details-lightbox details-link" title="Portfolio Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Web 3</h4>
                        <p>Web</p>
                        <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" data-gallery="portfolioDetailsGallery" data-glightbox="type: external" class="portfolio-details-lightbox details-link" title="Portfolio Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>App 2</h4>
                        <p>App</p>
                        <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" data-gallery="portfolioDetailsGallery" data-glightbox="type: external" class="portfolio-details-lightbox details-link" title="Portfolio Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Card 2</h4>
                        <p>Card</p>
                        <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" data-gallery="portfolioDetailsGallery" data-glightbox="type: external" class="portfolio-details-lightbox details-link" title="Portfolio Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Web 2</h4>
                        <p>Web</p>
                        <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" data-gallery="portfolioDetailsGallery" data-glightbox="type: external" class="portfolio-details-lightbox details-link" title="Portfolio Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>App 3</h4>
                        <p>App</p>
                        <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" data-gallery="portfolioDetailsGallery" data-glightbox="type: external" class="portfolio-details-lightbox details-link" title="Portfolio Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Card 1</h4>
                        <p>Card</p>
                        <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" data-gallery="portfolioDetailsGallery" data-glightbox="type: external" class="portfolio-details-lightbox details-link" title="Portfolio Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Card 3</h4>
                        <p>Card</p>
                        <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" data-gallery="portfolioDetailsGallery" data-glightbox="type: external" class="portfolio-details-lightbox details-link" title="Portfolio Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Web 3</h4>
                        <p>Web</p>
                        <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" data-gallery="portfolioDetailsGallery" data-glightbox="type: external" class="portfolio-details-lightbox details-link" title="Portfolio Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container">

            <div class="section-title">
                <h2>Team</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi
                    quidem hic quas.</p>
            </div>

            <div class="row">

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <div class="member-img">
                            <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Walter White</h4>
                            <span>Chief Executive Officer</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <div class="member-img">
                            <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Sarah Jhonson</h4>
                            <span>Product Manager</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <div class="member-img">
                            <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>William Anderson</h4>
                            <span>CTO</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <div class="member-img">
                            <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Amanda Jepson</h4>
                            <span>Accountant</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- End Team Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
        <div class="container">
            @foreach($pricing_title as $item)
            <div class="section-title">
                <h2>{{$item->title}}</h2>
                <p>{{$item->slogan}}</p>
            </div>
            @endforeach
            <div class="row">
                @foreach($price as $item)
                <div class="col-lg-3 col-md-6">

                    <div class="box">
                        <h3>{{$item->title}}</h3>
                        <h4><sup>₽</sup>{{$item->cost}}<span> / {{$item->time}}</span></h4>
                        <ul>
                            <li>{{$item->service1}}</li>
                            <li>{{$item->service2}}</li>
                            <li>{{$item->service3}}</li>
                            <li class="na">{{$item->noservice}}</li>
                            <li class="na">{{$item->noservice2}}</li>
                        </ul>
                        <div class="btn-wrap">
                            <a href="#" class="btn-buy">{{$item->button}}</a>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
                    @foreach($price_two as $item)
                    <div class="box featured">
                        <h3>{{$item->title}}</h3>
                        <h4><sup>₽</sup>{{$item->cost}}<span> / {{$item->time}}</span></h4>
                        <ul>
                            <li>{{$item->service1}}</li>
                            <li>{{$item->service2}}</li>
                            <li>{{$item->service3}}</li>
                            <li>{{$item->service4}}</li>
                            <li class="na">{{$item->noservice}}</li>
                        </ul>
                        <div class="btn-wrap">
                            <a href="#" class="btn-buy">{{$item->button}}</a>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                    <div class="box">
                        @foreach($price_three as $item)
                        <h3>{{$item->title}}</h3>
                        <h4><sup>₽</sup>{{$item->cost}}<span> / {{$item->time}}</span></h4>
                        <ul>
                            <li>{{$item->service1}}</li>
                            <li>{{$item->service2}}</li>
                            <li>{{$item->service3}}</li>
                            <li>{{$item->service4}}</li>
                            <li>{{$item->service5}}</li>
                        </ul>
                        <div class="btn-wrap">
                            <a href="#" class="btn-buy">{{$item->button}}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
                @foreach($price_four as $item)
                <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                    <div class="box">
                        <span class="advanced">{{$item->slogan}}</span>
                        <h3>{{$item->title}}</h3>
                        <h4><sup>₽</sup>{{$item->cost}}<span> / {{$item->time}}</span></h4>
                        <ul>
                            <li>{{$item->service1}}</li>
                            <li>{{$item->service2}}</li>
                            <li>{{$item->service3}}</li>
                            <li>{{$item->service4}}</li>
                            <li>{{$item->service5}}</li>
                        </ul>
                        <div class="btn-wrap">
                            <a href="#" class="btn-buy">{{$item->button}}</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- End Pricing Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
        <div class="container">
            @foreach($title_faq as $item)
            <div class="section-title">
                <h2>{{$item->title}}</h2>
            </div>
            @endforeach @foreach($faq as $item)
            <div class="faq-list">
                <ul>
                    <li data-aos="fade-up"> <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1" aria-expanded="true">{{$item->question}} <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                            <p> {{$item->answer}}</p>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
        @endforeach
    </section>
    <!-- End Frequently Asked Questions Section -->
    <!-- End Frequently Asked Questions Section -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">
            @foreach($contact_title as $item)


            <div class="section-title">
                <h2>{{$item->title}}</h2>
                <p>{{$item->slogan}}</p>
            </div>
            @endforeach
            <div class="row">

                <div class="col-lg-6">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box">
                                <i class="bx bx-map"></i>
                                <h3>Our Addres` s</h3>
                                <p>A108 Adam Street, New York, NY 535022</p>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="info-box mt-4">
                                @foreach($email as $item)
                                <i class="bx bx-envelope"></i>
                                <h3>{{$item->title}}</h3>
                                <p>{{$item->slogan}}<br>{{$item->slogan2}}</p>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-md-6">
                            @foreach($call as $item)
                            <div class="info-box mt-4">
                                <i class="bx bx-phone-call"></i>
                                <h3>{{$item->title}}</h3>
                                <p>{{$item->slogan}}<br>{{$item->slogan2}}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>
                </div>

            </div>

        </div>
    </section>
    <!-- End Contact Section -->

</main>
<!-- End #main -->