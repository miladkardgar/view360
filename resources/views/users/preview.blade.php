@extends('users.layouts.master')
@section('body')
    @php
        $site_settings = app('site_settings');
    @endphp


    <main id="ts-main">

        <!--BREADCRUMB
            =========================================================================================================-->
        <section id="breadcrumb">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Library</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
            </div>
        </section>

        <!--PAGE TITLE
            =========================================================================================================-->
        <section id="page-title">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-1 col-lg-10">
                        <div class="ts-title">
                            <h1>Preview</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--PREVIEW
            =========================================================================================================-->
        <section id="preview">
            <div class="container">
                <div class="row">

                    <div class="offset-lg-1 col-lg-10">

                        <!--BASIC INFORMATION
                            =====================================================================================-->
                        <section id="basic-information" class="mb-5">

                            <!--Title-->
                            <h3 class="text-muted border-bottom">Basic Information</h3>

                            <!--Row-->
                            <div class="row">

                                <!--Title-->
                                <div class="col-sm-8">
                                    <label>Title</label>
                                    <p>Luxury Apartment</p>
                                </div>

                                <!--Price-->
                                <div class="col-sm-4">
                                    <label>Price</label>
                                    <p>$98,000</p>
                                </div>

                                <div class="col-sm-12 col-md-4">

                                    <div class="row">

                                        <!--Area-->
                                        <div class="col">
                                            <label>Area</label>
                                            <p>354m<sup>2</sup></p>
                                        </div>

                                        <!--Rooms-->
                                        <div class="col">
                                            <label>Rooms</label>
                                            <p>4</p>
                                        </div>

                                    </div>
                                    <!--end row-->

                                </div>
                                <!--end col-md-4-->

                                <!--Type Select-->
                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Type</label>
                                        <p>Apartment</p>
                                    </div>
                                </div>

                                <!--Status Select-->
                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <p>Sale</p>
                                    </div>
                                </div>

                            </div>
                            <!--end row-->
                        </section>

                        <!--LOCATION
                            =====================================================================================-->
                        <section id="location" class="mb-5">

                            <!--Title-->
                            <h3 class="text-muted border-bottom">Location</h3>

                            <div class="row">

                                <div class="col-sm-6">

                                    <!--Address-->
                                    <div class="input-group">
                                        <label>Address</label>
                                        <p>489 London Street</p>
                                    </div>

                                    <!--City-->
                                    <div class="form-group">
                                        <label>City</label>
                                        <p>Ellensburg</p>
                                    </div>

                                    <!--State-->
                                    <div class="form-group">
                                        <label>State</label>
                                        <p>Washington</p>
                                    </div>

                                    <!--ZIP-->
                                    <div class="form-group mb-0">
                                        <label>ZIP</label>
                                        <p>98926</p>
                                    </div>

                                </div>
                                <!--end col-md-6-->

                                <!--Map-->
                                <div class="col-sm-6">
                                    <div id="ts-map-simple" class="ts-map ts-shadow__sm h-100"
                                         data-ts-map-leaflet-provider="https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}{r}.png"
                                         data-ts-map-zoom="12"
                                         data-ts-map-center-latitude="40.702411"
                                         data-ts-map-center-longitude="-73.556842"
                                         data-ts-map-scroll-wheel="1"
                                         data-ts-map-controls="0">
                                    </div>
                                </div>
                                <!--end col-md-6-->

                            </div>
                            <!--end row-->
                        </section>
                        <!--end #location-->

                        <!--GALLERY
                            =====================================================================================-->
                        <section id="gallery" class="mb-5">

                            <!--Title-->
                            <h3 class="text-muted border-bottom">Gallery</h3>

                            <!--Uploaded images-->
                            <div class="file-uploaded-images">

                                <!--Image-->
                                <div class="image">
                                    <img src="assets/img/img-item-thumb-01.jpg" alt="">
                                </div>

                                <!--Image-->
                                <div class="image">
                                    <img src="assets/img/img-item-thumb-02.jpg" alt="">
                                </div>

                                <!--Image-->
                                <div class="image">
                                    <img src="assets/img/img-item-thumb-03.jpg" alt="">
                                </div>

                            </div>

                        </section>

                        <!--ADDITIONAL INFORMATION
                            =====================================================================================-->
                        <section id="additional-information" class="mb-5">

                            <!--Title-->
                            <h3 class="text-muted border-bottom">Additional Information</h3>

                            <!--Description-->
                            <section>

                                <label>Description</label>
                                <p>
                                    Sed rhoncus arcu ut metus hendrerit gravida. Quisque eu urna neque. Maecenas
                                    consectetur, nisl euismod fermentum tempor, nunc ipsum pretium tellus, eget
                                    feugiat risus est tincidunt lacus. Vestibulum tortor erat, sodales sit amet
                                    dolor ut, dictum faucibus eros. Vivamus malesuada eleifend tellus at posuere.
                                </p>

                            </section>

                            <section>
                                <!--Row-->
                                <div class="row">

                                    <!--Bedrooms-->
                                    <div class="col-sm-4">
                                        <label>Bedrooms</label>
                                        <p>3</p>
                                    </div>

                                    <!--Bathrooms-->
                                    <div class="col-sm-4">
                                        <label>Bathrooms</label>
                                        <p>2</p>
                                    </div>

                                    <!--Garages-->
                                    <div class="col-sm-4">
                                        <label>Garages</label>
                                        <p>2</p>
                                    </div>

                                </div>
                            </section>


                            <section id="features-checkboxes">
                                <h6 class="mb-3">Features</h6>

                                <!--Checkboxes-->
                                <div class="ts-column-count-3">

                                    <ul class="ts-list-check-marks">
                                        <li class="ts-checked">Air conditioning</li>
                                        <li>Bedding</li>
                                        <li>Heating</li>
                                        <li class="ts-checked">Internet</li>
                                        <li class="ts-checked">Microwave</li>
                                        <li>Bedding</li>
                                        <li>Heating</li>
                                        <li>Internet</li>
                                        <li>Microwave</li>
                                        <li>Smoking allowed</li>
                                        <li class="ts-checked">Terrace</li>
                                        <li>Balcony</li>
                                        <li>Iron</li>
                                        <li class="ts-checked">Hi-Fi</li>
                                        <li>Beach</li>
                                    </ul>


                                </div>
                                <!--end ts-column-count-3-->

                            </section>

                        </section>
                        <!--end #additional-information-->

                        <hr>

                        <section class="py-3">
                            <a href="edit-property.html" class="btn btn-outline-secondary btn-lg float-right">
                                <i class="fa fa-pencil-alt mr-2"></i>
                                ویرایش فایل
                            </a>
                            <button type="submit" onclick="window.location='submitted.html'" class="btn btn-primary ts-btn-arrow btn-lg float-left">ارسال فایل </button>
                        </section>
                    </div>
                    <!--end offset-lg-1 col-lg-10-->
                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>

    </main>

@endsection