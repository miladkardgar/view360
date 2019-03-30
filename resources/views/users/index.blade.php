@extends('users.layouts.master')
@section('body')
    <section id="ts-hero" class=" mb-0 rtl">
        <div class="ts-full-screen d-flex">
            <div class="ts-map w-100 ts-z-index__1">
                <div id="ts-map-hero" class="h-100 ts-z-index__1"
                     data-ts-map-leaflet-provider="https://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}.png?accesstoken=sk.eyJ1IjoibWlsYWRrYXJkZ2FyIiwiYSI6ImNqdHN2czc4ZzAwMmk0YWx6b3pxc3djeGkifQ.14LK8WpxZqIvuqkFxbRe8g"
                     data-ts-map-leaflet-attribution="&copy; <a href='http://www.openstreetmap.org/copyright'>OpenStreetMap</a> &copy; <a href='http://cartodb.com/attributions'>CartoDB</a>"
                     data-ts-map-zoom-position="topleft"
                     data-ts-map-scroll-wheel="0"
                     data-ts-map-zoom="13"
                     data-ts-map-center-latitude="35.739795"
                     data-ts-map-center-longitude="51.423314"
                     data-ts-locale="en-US"
                     data-ts-currency="USD"
                     data-ts-unit="m<sup>2</sup>"
                     data-ts-display-additional-info="area_Area;bedrooms_Bedrooms;bathrooms_Bathrooms"
                >
                </div>
            </div>

            <div class="ts-results__vertical ts-results__grid ts-shadow__sm w-100 h-100 scrollbar-inner bg-white ts-z-index__2">
                <section class="ts-form__grid" data-bg-color="#f6f6f6">
                    <h4 class="font-weight-normal ts-text-color-light">فیلتر های جست و جو</h4>
                    <form class="ts-form ts-box mb-0">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" id="keyword" name="keyword"
                                           placeholder="Address, City or ZIP">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <select class="custom-select mb-3" id="type" name="category">
                                    <option value="">نوع</option>
                                    <option value="1">آپارتمان</option>
                                    <option value="2">ویلا</option>
                                    <option value="3">زمین</option>
                                    <option value="4">کارگاه</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="custom-select mb-3" id="status" name="status">
                                    <option value="">وضعیت</option>
                                    <option value="1">فروش</option>
                                    <option value="2">رهن</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control border-right-0" id="min-area"
                                           placeholder="کمترین متراژ">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-white border-left-0">متر مربع</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control border-right-0" id="max-area"
                                           placeholder="بیشترین متراژ">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-white border-left-0">متر مربع</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control border-right-0" id="min-price"
                                           placeholder="کمترین قیمت">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-white border-left-0">$</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control border-right-0" id="max-price"
                                           placeholder="بیشترین قیمت">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-white border-left-0">$</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="ts-center__vertical justify-content-between">
                            <a href="#more-options-collapse" class="collapsed" data-toggle="collapse" role="button"
                               aria-expanded="false" aria-controls="more-options-collapse">
                                <i class="fa fa-plus-circle ts-text-color-primary mr-2 ts-visible-on-collapsed"></i>
                                <i class="fa fa-minus-circle ts-text-color-primary mr-2 ts-visible-on-uncollapsed"></i>
                                گزینه های بیشتر
                            </a>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary w-100" id="search-btn">جست و جو</button>
                            </div>

                        </div>
                        <div class="collapse" id="more-options-collapse">
                            <div class="pt-4">
                                <div class="form-row">

                                    <!--Bedrooms-->
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="bedrooms">خواب</label>
                                            <input type="number" class="form-control" id="bedrooms" name="bedrooms"
                                                   min="0">
                                        </div>
                                    </div>

                                    <!--Bathrooms-->
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="bathrooms">سالن</label>
                                            <input type="number" class="form-control" id="bathrooms" name="bathrooms"
                                                   min="0">
                                        </div>
                                    </div>

                                </div>
                                <div id="features-checkboxes" class="w-100">
                                    <h6 class="mb-3">ویژگی ها</h6>

                                    <div class="ts-column-count-3">

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_1"
                                                   name="features[]" value="ch_1">
                                            <label class="custom-control-label" for="ch_1">تهویه هوا</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_2"
                                                   name="features[]" value="ch_2">
                                            <label class="custom-control-label" for="ch_2">تخت خواب</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_3"
                                                   name="features[]" value="ch_3">
                                            <label class="custom-control-label" for="ch_3">گرمایش</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_4"
                                                   name="features[]" value="ch_4">
                                            <label class="custom-control-label" for="ch_4">اینترنت</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_5"
                                                   name="features[]" value="ch_5">
                                            <label class="custom-control-label" for="ch_5">ماکروفر</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_6"
                                                   name="features[]" value="ch_6">
                                            <label class="custom-control-label" for="ch_6">سیگار</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_7"
                                                   name="features[]" value="ch_7">
                                            <label class="custom-control-label" for="ch_7">Terrace</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_8"
                                                   name="features[]" value="ch_8">
                                            <label class="custom-control-label" for="ch_8">Balcony</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_9"
                                                   name="features[]" value="ch_9">
                                            <label class="custom-control-label" for="ch_9">Iron</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_10"
                                                   name="features[]" value="ch_10">
                                            <label class="custom-control-label" for="ch_10">Hi-Fi</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_11"
                                                   name="features[]" value="ch_11">
                                            <label class="custom-control-label" for="ch_11">Beach</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_12"
                                                   name="features[]" value="ch_12">
                                            <label class="custom-control-label" for="ch_12">Parking</label>
                                        </div>

                                    </div>
                                    <!--end ts-column-count-3-->

                                </div>
                            </div>
                        </div>
                    </form>
                </section>

                <section class="ts-center__vertical justify-content-between px-4 pt-3 pb-0 rtl">
                    <h4 class="font-weight-normal ts-text-color-light mb-0">نتایج جست و جو</h4>

                    <div id="display-control" class="d-none d-md-block">

                        <a href="#" class="btn btn-outline-secondary active px-3 mr-2 mb-2 ts-btn-border-muted">
                            <i class="fa fa-th-large"></i>
                        </a>
                        <a href="#" class="btn btn-outline-secondary px-3 mb-2 ts-btn-border-muted">
                            <i class="fa fa-th-list"></i>
                        </a>
                    </div>

                </section>

                <!-- RESULTS
                =====================================================================================================-->
                <section id="ts-results" class="h-100 rtl">
                    <div class="ts-results-wrapper"></div>
                </section>

            </div>
            <!--end ts-results-vertical-->

        </div>
        <!--end full-screen-->

    </section>
    <main id="ts-main">

        <!-- FEATURED PROPERTIES
        =============================================================================================================-->
        <section id="featured-properties" class="ts-block pt-5">
            <div class="container">

                <!--Title-->
                <div class="ts-title text-center">
                    <h2>Featured Properties</h2>
                </div>

                <div class="row">

                    <!--Item-->
                    <div class="col-sm-6 col-lg-4">

                        <div class="card ts-item ts-card ts-item__lg">

                            <!--Ribbon-->
                            <div class="ts-ribbon">
                                <i class="fa fa-thumbs-up"></i>
                            </div>

                            <!--Card Image-->
                            <a href="detail-01.html" class="card-img ts-item__image" data-bg-image="{{url('public/assets/img/img-item-thumb-01.jpg')}}">
                                <div class="ts-item__info-badge">
                                    $350,000
                                </div>
                                <figure class="ts-item__info">
                                    <h4>Big Luxury Apartment</h4>
                                    <aside>
                                        <i class="fa fa-map-marker mr-2"></i>
                                        1350 Arbutus Drive
                                    </aside>
                                </figure>
                            </a>

                            <!--Card Body-->
                            <div class="card-body">
                                <div class="ts-description-lists">
                                    <dl>
                                        <dt>Area</dt>
                                        <dd>325m<sup>2</sup></dd>
                                    </dl>
                                    <dl>
                                        <dt>Bedrooms</dt>
                                        <dd>2</dd>
                                    </dl>
                                    <dl>
                                        <dt>Bathrooms</dt>
                                        <dd>1</dd>
                                    </dl>
                                </div>
                            </div>

                            <!--Card Footer-->
                            <a href="detail-01.html" class="card-footer">
                                <span class="ts-btn-arrow">Detail</span>
                            </a>

                        </div>
                        <!--end ts-item-->
                    </div>
                    <!--end Item col-md-4-->

                    <!--Item-->
                    <div class="col-sm-6 col-lg-4">

                        <div class="card ts-item ts-card ts-item__lg">

                            <!--Ribbon-->
                            <div class="ts-ribbon-corner">
                                <span>Updated</span>
                            </div>

                            <!--Card Image-->
                            <a href="detail-01.html" class="card-img ts-item__image" data-bg-image="{{url('public/assets/img/img-item-thumb-02.jpg')}}">
                                <figure class="ts-item__info">
                                    <h4>Cozy Design Studio</h4>
                                    <aside>
                                        <i class="fa fa-map-marker mr-2"></i>
                                        4831 Worthington Drive
                                    </aside>
                                </figure>
                                <div class="ts-item__info-badge">$125,000</div>
                            </a>

                            <!--Card Body-->
                            <div class="card-body ts-item__body">
                                <div class="ts-description-lists">
                                    <dl>
                                        <dt>Area</dt>
                                        <dd>325m<sup>2</sup></dd>
                                    </dl>
                                    <dl>
                                        <dt>Bedrooms</dt>
                                        <dd>2</dd>
                                    </dl>
                                    <dl>
                                        <dt>Bathrooms</dt>
                                        <dd>1</dd>
                                    </dl>
                                </div>
                            </div>

                            <!--Card Footer-->
                            <a href="detail-01.html" class="card-footer">
                                <span class="ts-btn-arrow">Detail</span>
                            </a>

                        </div>
                        <!--end ts-item ts-card-->
                    </div>
                    <!--end Item col-md-4-->

                    <!--Item-->
                    <div class="col-sm-6 col-lg-4">

                        <div class="card ts-item ts-card ts-item__lg">

                            <!--Card Image-->
                            <a href="detail-01.html" class="card-img ts-item__image" data-bg-image="{{url('public/assets/img/img-item-thumb-03.jpg')}}">
                                <figure class="ts-item__info">
                                    <h4>Family Villa</h4>
                                    <aside>
                                        <i class="fa fa-map-marker mr-2"></i>
                                        4127 Winding Way
                                    </aside>
                                </figure>
                                <div class="ts-item__info-badge">$45,900</div>
                            </a>

                            <!--Card Body-->
                            <div class="card-body ts-item__body">
                                <div class="ts-description-lists">
                                    <dl>
                                        <dt>Area</dt>
                                        <dd>325m<sup>2</sup></dd>
                                    </dl>
                                    <dl>
                                        <dt>Bedrooms</dt>
                                        <dd>2</dd>
                                    </dl>
                                    <dl>
                                        <dt>Bathrooms</dt>
                                        <dd>1</dd>
                                    </dl>
                                </div>
                            </div>

                            <!--Card Footer-->
                            <a href="detail-01.html" class="card-footer">
                                <span class="ts-btn-arrow">Detail</span>
                            </a>

                        </div>
                        <!--end ts-item ts-card-->
                    </div>
                    <!--end Item col-md-4-->

                </div>
                <!--end row-->

                <!--All properties button-->
                <div class="text-center mt-3">
                    <a href="listing-category-icons.html" class="btn btn-outline-dark ts-btn-border-muted">Show All Properties</a>
                </div>

            </div>
            <!--end container-->
        </section>

        <!-- FEATURES
        =============================================================================================================-->
        <section class="ts-block bg-white">
            <div class="container py-4">
                <div class="row">

                    <!--Feature-->
                    <div class="col-sm-6 col-md-3">
                        <div class="ts-feature">

                            <figure class="ts-feature__icon p-2">
                                    <span class="ts-circle">
                                        <i class="fa fa-check"></i>
                                    </span>
                                <img src="{{url('public/assets/img/icon-house.png')}}" alt="">
                            </figure>

                            <h4>Properties at Great Prices</h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

                        </div>
                    </div>

                    <!--Feature-->
                    <div class="col-sm-6 col-md-3">
                        <div class="ts-feature">

                            <figure class="ts-feature__icon p-2">
                                    <span class="ts-circle">
                                        <i class="fa fa-check"></i>
                                    </span>
                                <img src="{{url('public/assets/img/icon-pin.png')}}" alt="">
                            </figure>

                            <h4>Everything on One Place</h4>

                            <p>In dictum ac augue et suscipit. Vivamus ac tellus ut massa</p>

                        </div>
                    </div>

                    <!--Feature-->
                    <div class="col-sm-6 col-md-3">
                        <div class="ts-feature">

                            <figure class="ts-feature__icon p-2">
                                    <span class="ts-circle">
                                        <i class="fa fa-check"></i>
                                    </span>
                                <img src="{{url('public/assets/img/icon-agent.png')}}" alt="">
                            </figure>

                            <h4>Local Agents</h4>

                            <p>Vivamus ac tellus ut massa bibendum aliquam vitae ac diam. </p>

                        </div>
                    </div>

                    <!--Feature-->
                    <div class="col-sm-6 col-md-3">
                        <div class="ts-feature">

                            <figure class="ts-feature__icon p-2">
                                    <span class="ts-circle">
                                        <i class="fa fa-check"></i>
                                    </span>
                                <img src="{{url('public/assets/img/icon-calculator.png')}}" alt="">
                            </figure>

                            <h4>Free Mortgage Calculation</h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

                        </div>
                    </div>

                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>
        <!--end ts-block-->

        <!-- SUBSCRIBE
        =============================================================================================================-->
        <section id="subscribe" class="ts-block text-white ts-separate-bg-element" data-bg-image="{{url('public/assets/img/bg-offices.jpg')}}" data-bg-color="#000" data-bg-image-opacity=".3">
            <div class="container">
                <div class="offset-lg-1 col-lg-10">

                    <h3 class="font-weight-light">Subscribe for great offers!</h3>

                    <form class="ts-form ts-form-email" data-php-path="{{url('/public/assets/php/email.php')}}">
                        <div class="row">

                            <!--Input-->
                            <div class="col-sm-8 col-md-10">
                                <div class="form-group mb-0">
                                    <input type="email" class="form-control" id="email-subscribe" aria-describedby="subscribe" name="email" placeholder="Email Address" required>
                                    <small class="form-text mt-2 ts-opacity__50">*You’ll get only relevant news once a week </small>
                                </div>
                            </div>

                            <!--Button-->
                            <div class="col-sm-4 col-md-2">
                                <button type="submit" class="btn btn-outline-light w-100">Submit</button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </section>

        <!--LATEST LISTINGS
        =============================================================================================================-->
        <section id="latest-listings" class="ts-block">
            <div class="container">

                <!--Title-->
                <div class="ts-title">
                    <h2>Latest Listings</h2>
                </div>

                <!--Row-->
                <div class="row">

                    <!--Item-->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card ts-item ts-card">

                            <!--Ribbon-->
                            <div class="ts-ribbon">
                                <i class="fa fa-thumbs-up"></i>
                            </div>

                            <!--Card Image-->
                            <a href="detail-01.html" class="card-img ts-item__image" data-bg-image="{{url('public/assets/img/img-item-thumb-01.jpg')}}">
                                <div class="ts-item__info-badge">
                                    $350,000
                                </div>
                                <figure class="ts-item__info">
                                    <h4>Big Luxury Apartment</h4>
                                    <aside>
                                        <i class="fa fa-map-marker mr-2"></i>
                                        1350 Arbutus Drive
                                    </aside>
                                </figure>
                            </a>

                            <!--Card Body-->
                            <div class="card-body">
                                <div class="ts-description-lists">
                                    <dl>
                                        <dt>Area</dt>
                                        <dd>325m<sup>2</sup></dd>
                                    </dl>
                                    <dl>
                                        <dt>Bedrooms</dt>
                                        <dd>2</dd>
                                    </dl>
                                    <dl>
                                        <dt>Bathrooms</dt>
                                        <dd>1</dd>
                                    </dl>
                                </div>
                            </div>

                            <!--Card Footer-->
                            <a href="detail-01.html" class="card-footer">
                                <span class="ts-btn-arrow">Detail</span>
                            </a>

                        </div>
                        <!--end ts-item-->
                    </div>
                    <!--end Item col-md-4-->

                    <!--Item-->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card ts-item ts-card">

                            <!--Ribbon-->
                            <div class="ts-ribbon-corner">
                                <span>Updated</span>
                            </div>

                            <!--Card Image-->
                            <a href="detail-01.html" class="card-img ts-item__image" data-bg-image="{{url('public/assets/img/img-item-thumb-02.jpg')}}">
                                <figure class="ts-item__info">
                                    <h4>Cozy Design Studio</h4>
                                    <aside>
                                        <i class="fa fa-map-marker mr-2"></i>
                                        4831 Worthington Drive
                                    </aside>
                                </figure>
                                <div class="ts-item__info-badge">$125,000</div>
                            </a>

                            <!--Card Body-->
                            <div class="card-body ts-item__body">
                                <div class="ts-description-lists">
                                    <dl>
                                        <dt>Area</dt>
                                        <dd>325m<sup>2</sup></dd>
                                    </dl>
                                    <dl>
                                        <dt>Bedrooms</dt>
                                        <dd>2</dd>
                                    </dl>
                                    <dl>
                                        <dt>Bathrooms</dt>
                                        <dd>1</dd>
                                    </dl>
                                </div>
                            </div>

                            <!--Card Footer-->
                            <a href="detail-01.html" class="card-footer">
                                <span class="ts-btn-arrow">Detail</span>
                            </a>

                        </div>
                        <!--end ts-item ts-card-->
                    </div>
                    <!--end Item col-md-4-->

                    <!--Item-->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card ts-item ts-card">

                            <!--Card Image-->
                            <a href="detail-01.html" class="card-img ts-item__image" data-bg-image="{{url('public/assets/img/img-item-thumb-03.jpg')}}">
                                <figure class="ts-item__info">
                                    <h4>Family Villa</h4>
                                    <aside>
                                        <i class="fa fa-map-marker mr-2"></i>
                                        4127 Winding Way
                                    </aside>
                                </figure>
                                <div class="ts-item__info-badge">$45,900</div>
                            </a>

                            <!--Card Body-->
                            <div class="card-body ts-item__body">
                                <div class="ts-description-lists">
                                    <dl>
                                        <dt>Area</dt>
                                        <dd>325m<sup>2</sup></dd>
                                    </dl>
                                    <dl>
                                        <dt>Bedrooms</dt>
                                        <dd>2</dd>
                                    </dl>
                                    <dl>
                                        <dt>Bathrooms</dt>
                                        <dd>1</dd>
                                    </dl>
                                </div>
                            </div>

                            <!--Card Footer-->
                            <a href="detail-01.html" class="card-footer">
                                <span class="ts-btn-arrow">Detail</span>
                            </a>

                        </div>
                        <!--end ts-item ts-card-->
                    </div>
                    <!--end Item col-md-4-->

                    <!--Item-->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card ts-item ts-card">

                            <!--Card Image-->
                            <a href="detail-01.html" class="card-img ts-item__image" data-bg-image="{{url('public/assets/img/img-item-thumb-04.jpg')}}">
                                <div class="ts-item__info-badge">
                                    $860,000
                                </div>
                                <figure class="ts-item__info">
                                    <h4>Traditional Restaurant</h4>
                                    <aside>
                                        <i class="fa fa-map-marker mr-2"></i>
                                        1350 Arbutus Drive
                                    </aside>
                                </figure>
                            </a>

                            <!--Card Body-->
                            <div class="card-body">
                                <div class="ts-description-lists">
                                    <dl>
                                        <dt>Area</dt>
                                        <dd>325m<sup>2</sup></dd>
                                    </dl>
                                    <dl>
                                        <dt>Bedrooms</dt>
                                        <dd>2</dd>
                                    </dl>
                                    <dl>
                                        <dt>Bathrooms</dt>
                                        <dd>1</dd>
                                    </dl>
                                </div>
                            </div>

                            <!--Card Footer-->
                            <a href="detail-01.html" class="card-footer">
                                <span class="ts-btn-arrow">Detail</span>
                            </a>

                        </div>
                        <!--end ts-item-->
                    </div>
                    <!--end Item col-md-4-->

                    <!--Item-->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card ts-item ts-card">

                            <!--Card Image-->
                            <a href="detail-01.html" class="card-img ts-item__image" data-bg-image="{{url('public/assets/img/img-item-thumb-05.jpg')}}">
                                <figure class="ts-item__info">
                                    <h4>White Cubes Resort</h4>
                                    <aside>
                                        <i class="fa fa-map-marker mr-2"></i>
                                        4831 Worthington Drive
                                    </aside>
                                </figure>
                                <div class="ts-item__info-badge">$435,000</div>
                            </a>

                            <!--Card Body-->
                            <div class="card-body ts-item__body">
                                <div class="ts-description-lists">
                                    <dl>
                                        <dt>Area</dt>
                                        <dd>325m<sup>2</sup></dd>
                                    </dl>
                                    <dl>
                                        <dt>Bedrooms</dt>
                                        <dd>2</dd>
                                    </dl>
                                    <dl>
                                        <dt>Bathrooms</dt>
                                        <dd>1</dd>
                                    </dl>
                                </div>
                            </div>

                            <!--Card Footer-->
                            <a href="detail-01.html" class="card-footer">
                                <span class="ts-btn-arrow">Detail</span>
                            </a>

                        </div>
                        <!--end ts-item ts-card-->
                    </div>
                    <!--end Item col-md-4-->

                    <!--Item-->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card ts-item ts-card">

                            <!--Card Image-->
                            <a href="detail-01.html" class="card-img ts-item__image" data-bg-image="{{url('public/assets/img/img-item-thumb-06.jpg')}}">
                                <figure class="ts-item__info">
                                    <h4>Bristol Tower Complex</h4>
                                    <aside>
                                        <i class="fa fa-map-marker mr-2"></i>
                                        4127 Winding Way
                                    </aside>
                                </figure>
                                <div class="ts-item__info-badge">$85,900</div>
                            </a>

                            <!--Card Body-->
                            <div class="card-body ts-item__body">
                                <div class="ts-description-lists">
                                    <dl>
                                        <dt>Area</dt>
                                        <dd>325m<sup>2</sup></dd>
                                    </dl>
                                    <dl>
                                        <dt>Bedrooms</dt>
                                        <dd>2</dd>
                                    </dl>
                                    <dl>
                                        <dt>Bathrooms</dt>
                                        <dd>1</dd>
                                    </dl>
                                </div>
                            </div>

                            <!--Card Footer-->
                            <a href="detail-01.html" class="card-footer">
                                <span class="ts-btn-arrow">Detail</span>
                            </a>

                        </div>
                        <!--end ts-item ts-card-->
                    </div>
                    <!--end Item col-md-4-->

                    <!--Item-->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card ts-item ts-card">

                            <!--Card Image-->
                            <a href="detail-01.html" class="card-img ts-item__image" data-bg-image="{{url('public/assets/img/img-item-thumb-07.jpg')}}">
                                <figure class="ts-item__info">
                                    <h4>River Apartments</h4>
                                    <aside>
                                        <i class="fa fa-map-marker mr-2"></i>
                                        1350 Arbutus Drive
                                    </aside>
                                </figure>
                                <div class="ts-item__info-badge">
                                    $120,000
                                </div>
                            </a>

                            <!--Card Body-->
                            <div class="card-body">
                                <div class="ts-description-lists">
                                    <dl>
                                        <dt>Area</dt>
                                        <dd>325m<sup>2</sup></dd>
                                    </dl>
                                    <dl>
                                        <dt>Bedrooms</dt>
                                        <dd>2</dd>
                                    </dl>
                                    <dl>
                                        <dt>Bathrooms</dt>
                                        <dd>1</dd>
                                    </dl>
                                </div>
                            </div>

                            <!--Card Footer-->
                            <a href="detail-01.html" class="card-footer">
                                <span class="ts-btn-arrow">Detail</span>
                            </a>

                        </div>
                        <!--end ts-item-->
                    </div>
                    <!--end Item col-md-4-->

                    <!--Item-->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card ts-item ts-card">

                            <div class="badge badge-dark">Rent</div>

                            <!--Card Image-->
                            <a href="detail-01.html" class="card-img ts-item__image" data-bg-image="{{url('public/assets/img/img-item-thumb-08.jpg')}}">
                                <figure class="ts-item__info">
                                    <h4>Apartment for Rent</h4>
                                    <aside>
                                        <i class="fa fa-map-marker mr-2"></i>
                                        4831 Worthington Drive
                                    </aside>
                                </figure>
                                <div class="ts-item__info-badge">
                                    <span>$480</span>
                                    <small>/ month</small>
                                </div>
                            </a>

                            <!--Card Body-->
                            <div class="card-body ts-item__body">
                                <div class="ts-description-lists">
                                    <dl>
                                        <dt>Area</dt>
                                        <dd>325m<sup>2</sup></dd>
                                    </dl>
                                    <dl>
                                        <dt>Bedrooms</dt>
                                        <dd>2</dd>
                                    </dl>
                                    <dl>
                                        <dt>Bathrooms</dt>
                                        <dd>1</dd>
                                    </dl>
                                </div>
                            </div>

                            <!--Card Footer-->
                            <a href="detail-01.html" class="card-footer">
                                <span class="ts-btn-arrow">Detail</span>
                            </a>

                        </div>
                        <!--end ts-item ts-card-->
                    </div>
                    <!--end Item col-md-4-->

                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>

        <!--PRICING
        =============================================================================================================-->
        <section id="pricing" class="ts-block pt-0">
            <div class="container">

                <!--Title-->
                <div class="ts-title text-center">
                    <h2 class="mb-5">Affordable Prices</h2>
                </div>

                <!--Row-->
                <div class="row no-gutters ts-cards-same-height">

                    <!--Price Box-->
                    <div class="col-sm-4 col-lg-4">
                        <div class="card text-center ts-price-box">

                            <!--Header-->
                            <div class="card-header" data-bg-color="#dadada">
                                <h5 class="text-white" data-bg-color="#000296">Basic</h5>
                                <div class="ts-title">
                                    <h3 class="font-weight-normal">Free</h3>
                                    <small class="ts-opacity__50">Forever</small>
                                </div>
                            </div>

                            <!--Body-->
                            <div class="card-body p-0 border-bottom-0">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">1 Property</li>
                                    <li class="list-group-item">1 Agent Profile</li>
                                    <li class="list-group-item ts-na"><s>Agency Profile</s></li>
                                    <li class="list-group-item ts-na"><s>Featured Properties</s></li>
                                </ul>
                            </div>

                            <!--Footer-->
                            <div class="card-footer bg-transparent pt-0 border-0">
                                <a href="#" class="btn btn-outline-primary">Select Now</a>
                            </div>

                        </div>
                    </div>
                    <!--end price-box-->

                    <!--Price Box Promoted-->
                    <div class="col-sm-4 col-lg-4">
                        <div class="card text-center ts-price-box ts-price-box__promoted">

                            <!--Header-->
                            <div class="card-header" data-bg-color="#00004c">
                                <h5 class="text-white ts-bg-primary">Premium</h5>
                                <div class="ts-title text-white">
                                    <h3 class="font-weight-normal">
                                        <sup>$</sup>9,99
                                    </h3>
                                    <small class="ts-opacity__50">per month</small>
                                </div>
                            </div>

                            <!--Body-->
                            <div class="card-body p-0">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">20 Properties</li>
                                    <li class="list-group-item">10 Agent Profiles</li>
                                    <li class="list-group-item">5 Agency Profiles</li>
                                    <li class="list-group-item">Featured Properties</li>
                                </ul>
                            </div>

                            <!--Footer-->
                            <div class="card-footer bg-transparent pt-0 border-0">
                                <a href="#" class="btn btn-primary">Select Now</a>
                            </div>

                        </div>
                    </div>
                    <!--end price-box-->

                    <!--Price Box-->
                    <div class="col-sm-4 col-lg-4">
                        <div class="card text-center ts-price-box">

                            <!--Header-->
                            <div class="card-header" data-bg-color="#dadada">
                                <h5 class="text-white" data-bg-color="#000296">Professional</h5>
                                <div class="ts-title">
                                    <h3 class="font-weight-normal">
                                        <sup>$</sup>19,99
                                    </h3>
                                    <small class="ts-opacity__50">Per Month</small>
                                </div>
                            </div>

                            <!--Body-->
                            <div class="card-body p-0">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Unlimited Properties</li>
                                    <li class="list-group-item">Unlimited Agent Profiles</li>
                                    <li class="list-group-item">Unlimited Agency Profiles</li>
                                    <li class="list-group-item">Featured Properties</li>
                                </ul>
                            </div>

                            <!--Footer-->
                            <div class="card-footer bg-transparent pt-0 border-0">
                                <a href="#" class="btn btn-outline-primary">Select Now</a>
                            </div>

                        </div>
                    </div>
                    <!--end price-box-->

                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>

        <!--ITEM CAROUSEL
        =============================================================================================================-->
        <section class="ts-block" data-bg-pattern="{{url('public/assets/img/bg-pattern-dot.png')}}">

            <!--Title-->
            <div class="ts-title text-center">
                <h2>Our Top Picks</h2>
            </div>

            <!--Carousel-->
            <div class="owl-carousel ts-items-carousel" data-owl-items="5" data-owl-dots="1">

                <!--Item-->
                <div class="slide">

                    <div class="card ts-item ts-card ts-item__lg">

                        <!--Ribbon-->
                        <div class="ts-ribbon">
                            <i class="fa fa-thumbs-up"></i>
                        </div>

                        <!--Card Image-->
                        <a href="detail-01.html" class="card-img ts-item__image" data-bg-image="{{url('public/assets/img/img-item-thumb-01.jpg')}}">
                            <div class="ts-item__info-badge">
                                $350,000
                            </div>
                            <figure class="ts-item__info">
                                <h4>Big Luxury Apartment</h4>
                                <aside>
                                    <i class="fa fa-map-marker mr-2"></i>
                                    1350 Arbutus Drive
                                </aside>
                            </figure>
                        </a>

                        <!--Card Body-->
                        <div class="card-body">
                            <div class="ts-description-lists">
                                <dl>
                                    <dt>Area</dt>
                                    <dd>325m<sup>2</sup></dd>
                                </dl>
                                <dl>
                                    <dt>Bedrooms</dt>
                                    <dd>2</dd>
                                </dl>
                                <dl>
                                    <dt>Bathrooms</dt>
                                    <dd>1</dd>
                                </dl>
                            </div>
                        </div>

                        <!--Card Footer-->
                        <a href="detail-01.html" class="card-footer">
                            <span class="ts-btn-arrow">Detail</span>
                        </a>

                    </div>
                    <!--end ts-item-->
                </div>
                <!--end slide-->

                <!--Item-->
                <div class="slide">

                    <div class="card ts-item ts-card ts-item__lg">

                        <!--Ribbon-->
                        <div class="ts-ribbon-corner">
                            <span>Updated</span>
                        </div>

                        <!--Card Image-->
                        <a href="detail-01.html" class="card-img ts-item__image" data-bg-image="{{url('public/assets/img/img-item-thumb-02.jpg')}}">
                            <figure class="ts-item__info">
                                <h4>Cozy Design Studio</h4>
                                <aside>
                                    <i class="fa fa-map-marker mr-2"></i>
                                    4831 Worthington Drive
                                </aside>
                            </figure>
                            <div class="ts-item__info-badge">$125,000</div>
                        </a>

                        <!--Card Body-->
                        <div class="card-body ts-item__body">
                            <div class="ts-description-lists">
                                <dl>
                                    <dt>Area</dt>
                                    <dd>325m<sup>2</sup></dd>
                                </dl>
                                <dl>
                                    <dt>Bedrooms</dt>
                                    <dd>2</dd>
                                </dl>
                                <dl>
                                    <dt>Bathrooms</dt>
                                    <dd>1</dd>
                                </dl>
                            </div>
                        </div>

                        <!--Card Footer-->
                        <a href="detail-01.html" class="card-footer">
                            <span class="ts-btn-arrow">Detail</span>
                        </a>

                    </div>
                    <!--end ts-item ts-card-->
                </div>
                <!--end slide-->

                <!--Item-->
                <div class="slide">

                    <div class="card ts-item ts-card ts-item__lg">

                        <!--Card Image-->
                        <a href="detail-01.html" class="card-img ts-item__image" data-bg-image="{{url('public/assets/img/img-item-thumb-03.jpg')}}">
                            <figure class="ts-item__info">
                                <h4>Family Villa</h4>
                                <aside>
                                    <i class="fa fa-map-marker mr-2"></i>
                                    4127 Winding Way
                                </aside>
                            </figure>
                            <div class="ts-item__info-badge">$45,900</div>
                        </a>

                        <!--Card Body-->
                        <div class="card-body ts-item__body">
                            <div class="ts-description-lists">
                                <dl>
                                    <dt>Area</dt>
                                    <dd>325m<sup>2</sup></dd>
                                </dl>
                                <dl>
                                    <dt>Bedrooms</dt>
                                    <dd>2</dd>
                                </dl>
                                <dl>
                                    <dt>Bathrooms</dt>
                                    <dd>1</dd>
                                </dl>
                            </div>
                        </div>

                        <!--Card Footer-->
                        <a href="detail-01.html" class="card-footer">
                            <span class="ts-btn-arrow">Detail</span>
                        </a>

                    </div>
                    <!--end ts-item ts-card-->
                </div>
                <!--end slide-->

                <!--Item-->
                <div class="slide">
                    <div class="card ts-item ts-card ts-item__lg">

                        <!--Card Image-->
                        <a href="detail-01.html" class="card-img ts-item__image" data-bg-image="{{url('public/assets/img/img-item-thumb-04.jpg')}}">
                            <div class="ts-item__info-badge">
                                $860,000
                            </div>
                            <figure class="ts-item__info">
                                <h4>Traditional Restaurant</h4>
                                <aside>
                                    <i class="fa fa-map-marker mr-2"></i>
                                    1350 Arbutus Drive
                                </aside>
                            </figure>
                        </a>

                        <!--Card Body-->
                        <div class="card-body">
                            <div class="ts-description-lists">
                                <dl>
                                    <dt>Area</dt>
                                    <dd>325m<sup>2</sup></dd>
                                </dl>
                                <dl>
                                    <dt>Bedrooms</dt>
                                    <dd>2</dd>
                                </dl>
                                <dl>
                                    <dt>Bathrooms</dt>
                                    <dd>1</dd>
                                </dl>
                            </div>
                        </div>

                        <!--Card Footer-->
                        <a href="detail-01.html" class="card-footer">
                            <span class="ts-btn-arrow">Detail</span>
                        </a>

                    </div>
                    <!--end ts-item-->
                </div>
                <!--end slide-->

                <!--Item-->
                <div class="slide">
                    <div class="card ts-item ts-card ts-item__lg">

                        <!--Card Image-->
                        <a href="detail-01.html" class="card-img ts-item__image" data-bg-image="{{url('public/assets/img/img-item-thumb-05.jpg')}}">
                            <figure class="ts-item__info">
                                <h4>White Cubes Resort</h4>
                                <aside>
                                    <i class="fa fa-map-marker mr-2"></i>
                                    4831 Worthington Drive
                                </aside>
                            </figure>
                            <div class="ts-item__info-badge">$435,000</div>
                        </a>

                        <!--Card Body-->
                        <div class="card-body ts-item__body">
                            <div class="ts-description-lists">
                                <dl>
                                    <dt>Area</dt>
                                    <dd>325m<sup>2</sup></dd>
                                </dl>
                                <dl>
                                    <dt>Bedrooms</dt>
                                    <dd>2</dd>
                                </dl>
                                <dl>
                                    <dt>Bathrooms</dt>
                                    <dd>1</dd>
                                </dl>
                            </div>
                        </div>

                        <!--Card Footer-->
                        <a href="detail-01.html" class="card-footer">
                            <span class="ts-btn-arrow">Detail</span>
                        </a>

                    </div>
                    <!--end ts-item ts-card-->
                </div>
                <!--end slide-->

                <!--Item-->
                <div class="slide">
                    <div class="card ts-item ts-card ts-item__lg">

                        <!--Card Image-->
                        <a href="detail-01.html" class="card-img ts-item__image" data-bg-image="{{url('public/assets/img/img-item-thumb-06.jpg')}}">
                            <figure class="ts-item__info">
                                <h4>Bristol Tower Complex</h4>
                                <aside>
                                    <i class="fa fa-map-marker mr-2"></i>
                                    4127 Winding Way
                                </aside>
                            </figure>
                            <div class="ts-item__info-badge">$85,900</div>
                        </a>

                        <!--Card Body-->
                        <div class="card-body ts-item__body">
                            <div class="ts-description-lists">
                                <dl>
                                    <dt>Area</dt>
                                    <dd>325m<sup>2</sup></dd>
                                </dl>
                                <dl>
                                    <dt>Bedrooms</dt>
                                    <dd>2</dd>
                                </dl>
                                <dl>
                                    <dt>Bathrooms</dt>
                                    <dd>1</dd>
                                </dl>
                            </div>
                        </div>

                        <!--Card Footer-->
                        <a href="detail-01.html" class="card-footer">
                            <span class="ts-btn-arrow">Detail</span>
                        </a>

                    </div>
                    <!--end ts-item ts-card-->
                </div>
                <!--end slide-->

                <!--Item-->
                <div class="slide">
                    <div class="card ts-item ts-card ts-item__lg">

                        <!--Card Image-->
                        <a href="detail-01.html" class="card-img ts-item__image" data-bg-image="{{url('public/assets/img/img-item-thumb-07.jpg')}}">
                            <figure class="ts-item__info">
                                <h4>River Apartments</h4>
                                <aside>
                                    <i class="fa fa-map-marker mr-2"></i>
                                    1350 Arbutus Drive
                                </aside>
                            </figure>
                            <div class="ts-item__info-badge">
                                $120,000
                            </div>
                        </a>

                        <!--Card Body-->
                        <div class="card-body">
                            <div class="ts-description-lists">
                                <dl>
                                    <dt>Area</dt>
                                    <dd>325m<sup>2</sup></dd>
                                </dl>
                                <dl>
                                    <dt>Bedrooms</dt>
                                    <dd>2</dd>
                                </dl>
                                <dl>
                                    <dt>Bathrooms</dt>
                                    <dd>1</dd>
                                </dl>
                            </div>
                        </div>

                        <!--Card Footer-->
                        <a href="detail-01.html" class="card-footer">
                            <span class="ts-btn-arrow">Detail</span>
                        </a>

                    </div>
                    <!--end ts-item-->
                </div>
                <!--end slide-->

                <!--Item-->
                <div class="slide">
                    <div class="card ts-item ts-card ts-item__lg">

                        <div class="badge badge-primary">Rent</div>

                        <!--Card Image-->
                        <a href="detail-01.html" class="card-img ts-item__image" data-bg-image="{{url('public/assets/img/img-item-thumb-08.jpg')}}">
                            <figure class="ts-item__info">
                                <h4>Apartment for Rent</h4>
                                <aside>
                                    <i class="fa fa-map-marker mr-2"></i>
                                    4831 Worthington Drive
                                </aside>
                            </figure>
                            <div class="ts-item__info-badge">
                                <span>$480</span>
                                <small>/ month</small>
                            </div>
                        </a>

                        <!--Card Body-->
                        <div class="card-body ts-item__body">
                            <div class="ts-description-lists">
                                <dl>
                                    <dt>Area</dt>
                                    <dd>325m<sup>2</sup></dd>
                                </dl>
                                <dl>
                                    <dt>Bedrooms</dt>
                                    <dd>2</dd>
                                </dl>
                                <dl>
                                    <dt>Bathrooms</dt>
                                    <dd>1</dd>
                                </dl>
                            </div>
                        </div>

                        <!--Card Footer-->
                        <a href="detail-01.html" class="card-footer">
                            <span class="ts-btn-arrow">Detail</span>
                        </a>

                    </div>
                    <!--end ts-item ts-card-->
                </div>
                <!--end slide-->


            </div>
        </section>
        <!--end ts-block-->

        <!--SUBMIT BANNER
        =============================================================================================================-->
        <section id="submit-banner" class="ts-block">
            <div class="container">

                <div class="ts-block-inside text-center ts-separate-bg-element text-white" data-bg-image-opacity=".4" data-bg-image="{{url('public/assets/img/bg-chair.jpg')}}" data-bg-color="#000">
                    <figure class="h1 font-weight-light mb-2">Have Some Property For Sale?</figure>
                    <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                    <a href="submit.html" class="btn btn-light">Submit Your Own</a>
                </div>

            </div>
        </section>

        <!--PARTNERS
        =============================================================================================================-->
        <section id="partners" class="ts-block pt-4 pb-0">
            <div class="container">

                <!--Logos-->
                <div class="d-block d-md-flex justify-content-between align-items-center text-center ts-partners py-3">

                    <a href="#">
                        <img src="{{url('public/assets/img/logo-01.png')}}" alt="">
                    </a>

                    <a href="#">
                        <img src="{{url('public/assets/img/logo-02.png')}}" alt="">
                    </a>

                    <a href="#">
                        <img src="{{url('public/assets/img/logo-03.png')}}" alt="">
                    </a>

                    <a href="#">
                        <img src="{{url('public/assets/img/logo-04.png')}}" alt="">
                    </a>

                    <a href="#">
                        <img src="{{url('public/assets/img/logo-05.png')}}" alt="">
                    </a>

                </div>
                <!--end logos-->
            </div>
        </section>

    </main>

@endsection