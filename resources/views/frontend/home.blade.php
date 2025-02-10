@extends('frontend.layouts.app')
@section('content')
    <!--
    *******************
    SLIDER
    *******************
    -->
    <div class="owl-carousel owl-theme">
        <div class="full overlay-skew item1 h-100">
          <div class="vc-parent">
            <div class="vc-child">
              <div class="top-banner modern">
                <div class="container">
                  <div class="banner-wrap">
                    <h1 class="heading">Cloudy Web Hosting - <span class="text-change"> </span></h1>
                    <h3 class="subheading left">Cloudy have a powerful architecture with
                      <span class="c-green"> World Class Tech*</span></h3>
                  </div>
                  <a href="" class="btn btn-default-green-fill">View Web Hosting</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="full overlay item2 h-100">
          <div class="vc-parent">
            <div class="vc-child">
              <div class="top-banner modern">
                <div class="container">
                  <div class="banner-wrap">
                    <h1 class="heading">Cloudy Dedicated Servers</h1>
                    <h3 class="subheading left">Amazing, high-end servers for your mission critical projects</h3>
                  </div>
                  <a href="" class="btn btn-default-green-fill">View Dedicated Servers</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--
      *******************
      PRICING TABLES
      *******************
      -->
      <section class="pricing special sec-normal sec-bg1">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2 class="section-heading">Select Your Best Plan</h2>
              <p class="section-subheading">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
            </div>
            <div class="col-md-4 col-lg-4">
              <div class="wrapper first">
                <img class="mb-3" src="fonts/svg/cloudfiber.svg" height="65" alt="">
                <div class="title">Cloud Hosting</div>
                <div class="fromer">from</div>
                <div class="price"><sup>$</sup>24.99 <span class="period">/mo</span></div>
                <ul class="list-info">
                  <li>90GB Disk Space</li>
                  <li>500GB Bandwith</li>
                  <li>35 Email Accounts</li>
                  <li>10 Domains</li>
                </ul>
                <a href="" class="btn btn-default-green-fill">Order now</a>
              </div>
            </div>
            <div class="col-md-4 col-lg-4">
              <div class="wrapper">
                <div class="plans badge feat bg-green">Popular</div>
                <img class="mb-3" src="fonts/svg/dedicated.svg" height="65" alt="">
                <div class="title">Dedicated Server</div>
                <div class="fromer">from</div>
                <div class="price"><sup>$</sup>185.00 <span class="period">/mo</span></div>
                <ul class="list-info">
                  <li>8GB DDR3 ECC</li>
                  <li>4x2 3.20Ghz</li>
                  <li>1TB SSD</li>
                  <li>8 Domains</li>
                </ul>
                <a href="" class="btn btn-default-green-fill">Configure</a>
              </div>
            </div>
            <div class="col-md-4 col-lg-4">
              <div class="wrapper third">
                <img class="mb-3" src="fonts/svg/vps.svg" height="65" alt="">
                <div class="title">Cloud VPS</div>
                <div class="fromer">from</div>
                <div class="price"><sup>$</sup>109.99 <span class="period">/mo</span></div>
                <ul class="list-info">
                  <li>4Gb Memory</li>
                  <li>60GB HDD Raid 10</li>
                  <li>Unlimited Traffic</li>
                  <li>2 IP Address</li>
                </ul>
                <a href="" class="btn btn-default-green-fill">Configure</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--
      *******************
      WHY CHOOSE CLOUDY
      *******************
      -->
      <section class="services classic sec-normal item4 overlay-grad">
        <div class="container">
          <div class="service-wrap">
            <div class="row">
              <div class="col-sm-12 text-center">
                <h2 class="section-heading text-white">Why Choose Cloudy 7</h2>
                <p class="section-subheading text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
              </div>
              <div class="col-sm-12 col-md-4">
                <div class="service-section">
                  <i class="icon-helpdesk"></i>
                  <div class="title">Support 24x7x365</div>
                  <p class="subtitle">
                    Excepteur sint occaecat cupidatat non proident dolor
                  </p>
                  <a href="" class="btn btn-default-green">Read more</a>
                </div>
              </div>
              <div class="col-sm-12 col-md-4">
                <div class="service-section">
                  <i class="icon-move"></i>
                  <div class="title">Free Migration</div>
                  <p class="subtitle">
                    Duis aute irure dolor in reprehenderit in voluptate velit
                  </p>
                  <a href="" class="btn btn-default-green">Read more</a>
                </div>
              </div>
              <div class="col-sm-12 col-md-4">
                <div class="service-section">
                  <div class="plans badge feat bg-green">cPanel | SSD</div>
                  <i class="icon-cloudserver"></i>
                  <div class="title">High Performance</div>
                  <p class="subtitle">
                    Excepteur sint occaecat cupidatat non proident voluptate
                  </p>
                  <a href="" class="btn btn-default-green">Read more</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--
      *******************
      BEST SERVICES
      *******************
      -->
      <section class="h-services sec-normal">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2 class="section-heading">Our Best Services</h2>
              <p class="section-subheading">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
              <div class="wrap-service">
                <div class="plans badge feat bg-green">SSD</div>
                <i class="icon-vps"></i>
                <div class="heading">Cloud VPS</div>
                <div class="text-info">
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
              <div class="wrap-service">
                <i class="icon-dedicated"></i>
                <div class="heading">Dedicated Server</div>
                <div class="text-info">
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 clear-sm">
              <div class="wrap-service">
                <i class="icon-cloudfiber"></i>
                <div class="heading">Cloud Hosting</div>
                <div class="text-info">
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 clear-md">
              <div class="wrap-service">
                <i class="icon-reseller"></i>
                <div class="heading">Cloud Reseller</div>
                <div class="text-info">
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
              <div class="wrap-service">
                <div class="plans badge feat bg-grey">Website security</div>
                <i class="icon-cloudsecurity"></i>
                <div class="heading">SSL Certificates</div>
                <div class="text-info">
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
              <div class="wrap-service">
                <i class="icon-wordpress"></i>
                <div class="heading">WordPress</div>
                <div class="text-info">
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--
      *******************
      CASE STUDY
      *******************
      -->
      <section class="casestudy sec-normal sec-bg1">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-3 study-img">
              <img src="img/casestudy.jpg" class="w-100" alt="company">
            </div>
            <div class="col-sm-12 col-md-6 col-lg-9">
              <div class="slider-container slider-filter">
                <div class="slider-wrap">
                  <div class="swiper-container main-slider" data-autoplay="4000" data-touch="1" data-mouse="0" data-slides-per-view="responsive" data-loop="1" data-speed="1200" data-mode="horizontal" data-xs-slides="1" data-sm-slides="1" data-md-slides="1" data-lg-slides="1">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <h3 class="author">Matt Radford</h3>
                        <div class="content-info">
                          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi. Eaque ipsa quae ab illo inventore veritatis et quasi.</p>
                          <div>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</div>
                          ♡<em> President & Managing Director - Corporation</em>
                        </div>
                        <a href="" class="btn btn-default-green-fill ml-4">Case Study Download</a>
                      </div>
                      <div class="swiper-slide">
                        <h3 class="author">Michael Jones</h3>
                        <div class="content-info">
                          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi. Eaque ipsa quae ab illo inventore veritatis et quasi.</p>
                          <div>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</div>
                          ♡<em> Executive Director - Agency</em>
                        </div>
                        <a href="" class="btn btn-default-green-fill ml-4">Case Study Download</a>
                      </div>
                    </div>
                    <div class="pagination vertical-mode pagination-index"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--
@endsection
