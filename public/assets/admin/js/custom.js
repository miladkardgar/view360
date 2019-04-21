/* ------------------------------------------------------------------------------
 *
 *  # Custom JS code
 *
 *  Place here all your custom js. Make sure it's loaded after app.js
 *
 * ---------------------------------------------------------------------------- */


$(document).ready(function () {
    var lat = $("#lat").val();
    var lon = $("#lon").val();
    var mymap = L.map('mapid').setView([lat, lon], 13);
    var marker = L.marker([lat, lon]).addTo(mymap);
    marker.bindPopup("<span>موقعیت فایل: </span>" + lat + " | " + lon + "<br>").openPopup();
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWlsYWRrYXJkZ2FyIiwiYSI6ImNqdG9haWp4NTB2dHY0OXBkNmExc3UyZGsifQ.Ys_SvYFAN9ska6SCG7j8gg', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox.streets',
        accessToken: 'pk.eyJ1IjoibWlsYWRrYXJkZ2FyIiwiYSI6ImNqdG9haWp4NTB2dHY0OXBkNmExc3UyZGsifQ.Ys_SvYFAN9ska6SCG7j8gg',
    }).addTo(mymap);

    mymap.on('click', function (e) {
        $(".leaflet-marker-pane").html("");
        $(".leaflet-shadow-pane").html("");
        var marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(mymap);
        marker.bindPopup("<span>موقعیت فایل: </span>" + e.latlng.lat + " | " + e.latlng.lng + "<br>").openPopup();
        $("#lat").val(e.latlng.lat);
        $("#lon").val(e.latlng.lng);
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $("#city_id").on("change", function () {
        var cID = $(this).val();
        var sID = $("#region_id").data("region-id");
        $.ajax({
            url: "/admin/estate/getArea",
            data: {id: cID},
            method: "POST",
            success: function (result) {
                $("#region_id").html("");
                var sel = '';
                $.each(result, function (i, item) {
                    if (item.id === sID) {
                        sel = 'selected'
                    } else {
                        sel = '';
                    }
                    $("#region_id").append("<option value='" + item.id + "' " + sel + ">" + item.name + "</option>")
                })
            },
            error() {
                console.log("error get area list");
            }
        })
    })
    $("#province_id").on("change", function () {
        var pID = $(this).val();
        var cID = $("#city_id").data("city-id");
        $.ajax({
            url: "/admin/estate/getArea",
            data: {id: pID},
            method: "POST",
            success: function (result) {
                $("#city_id").html("");
                $("#region_id").html("");
                var sel = '';
                $.each(result, function (i, item) {
                    if (item.id === cID) {
                        sel = 'selected'
                    } else {
                        sel = '';
                    }
                    $("#city_id").append("<option value='" + item.id + "' " + sel + ">" + item.name + "</option>")
                });
                $("#city_id").change();
            },
            error() {
                console.log("error get area list");
            }
        })
    });
    var pro = $("#province_id");
    if(pro.length > 0) {
        pro.change();
    }

    var FileUpload = function () {
        var _componentFileUpload = function () {
            if (!$().fileinput) {
                console.warn('Warning - fileinput.min.js is not loaded.');
                return;
            }
            var modalTemplate = '<div class="modal-dialog modal-lg" role="document">\n' +
                '  <div class="modal-content">\n' +
                '    <div class="modal-header align-items-center">\n' +
                '      <h6 class="modal-title">{heading} <small><span class="kv-zoom-title"></span></small></h6>\n' +
                '      <div class="kv-zoom-actions btn-group">{toggleheader}{fullscreen}{borderless}{close}</div>\n' +
                '    </div>\n' +
                '    <div class="modal-body">\n' +
                '      <div class="floating-buttons btn-group"></div>\n' +
                '      <div class="kv-zoom-body file-zoom-content"></div>\n' + '{prev} {next}\n' +
                '    </div>\n' +
                '  </div>\n' +
                '</div>\n';

            // Buttons inside zoom modal
            var previewZoomButtonClasses = {
                toggleheader: 'btn btn-light btn-icon btn-header-toggle btn-sm',
                fullscreen: 'btn btn-light btn-icon btn-sm',
                borderless: 'btn btn-light btn-icon btn-sm',
                close: 'btn btn-light btn-icon btn-sm'
            };

            // Icons inside zoom modal classes
            var previewZoomButtonIcons = {
                prev: '<i class="icon-arrow-left32"></i>',
                next: '<i class="icon-arrow-right32"></i>',
                toggleheader: '<i class="icon-menu-open"></i>',
                fullscreen: '<i class="icon-screen-full"></i>',
                borderless: '<i class="icon-alignment-unalign"></i>',
                close: '<i class="icon-cross2 font-size-base"></i>'
            };

            // File actions
            var fileActionSettings = {
                zoomClass: '',
                zoomIcon: '<i class="icon-zoomin3"></i>',
                dragClass: 'p-2',
                dragIcon: '<i class="icon-three-bars"></i>',
                removeClass: '',
                removeErrorClass: 'text-danger',
                removeIcon: '<i class="icon-bin"></i>',
                indicatorNew: '<i class="icon-file-plus text-success"></i>',
                indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
                indicatorError: '<i class="icon-cross2 text-danger"></i>',
                indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>'
            };
            //
            // AJAX upload
            //

            $('.file-input-ajax').fileinput({
                browseLabel: 'انتخاب فایل',
                uploadUrl: "{{url('/admin/estates/upload')}}",
                uploadAsync: false,
                maxFileCount: 10,
                showUpload: false,
                removeLabel: "حذف همه",
                initialPreview: [],
                browseIcon: '<i class="icon-file-plus mr-2"></i>',
                removeIcon: '<i class="icon-cross2 font-size-base mr-2"></i>',
                browseOnZoneClick: true,
                fileActionSettings: {
                    removeIcon: '<i class="icon-bin"></i>',
                    uploadClass: '',
                    zoomIcon: '<i class="icon-zoomin3"></i>',
                    zoomClass: '',
                    indicatorNew: '<i class="icon-file-plus text-success"></i>',
                    indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
                    indicatorError: '<i class="icon-cross2 text-danger"></i>',
                    indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>',
                },
                layoutTemplates: {
                    icon: '<i class="icon-file-check"></i>',
                    modal: modalTemplate
                },
                initialCaption: 'فایلی انتخاب نشده است',
                previewZoomButtonClasses: previewZoomButtonClasses,
                previewZoomButtonIcons: previewZoomButtonIcons
            });
            $('.file-input-ajax3d').fileinput({
                browseLabel: 'انتخاب فایل',
                uploadUrl: "{{url('/admin/estates/upload')}}",
                uploadAsync: false,
                maxFileCount: 1,
                maxFileSize: 1000000,
                showUpload: false,
                removeLabel: "حذف همه",
                initialPreview: [],
                browseIcon: '<i class="icon-file-plus mr-2"></i>',
                removeIcon: '<i class="icon-cross2 font-size-base mr-2"></i>',
                browseOnZoneClick: true,
                fileActionSettings: {
                    removeIcon: '<i class="icon-bin"></i>',
                    uploadClass: '',
                    zoomIcon: '<i class="icon-zoomin3"></i>',
                    zoomClass: '',
                    indicatorNew: '<i class="icon-file-plus text-success"></i>',
                    indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
                    indicatorError: '<i class="icon-cross2 text-danger"></i>',
                    indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>',
                },
                layoutTemplates: {
                    icon: '<i class="icon-file-check"></i>',
                    modal: modalTemplate
                },
                initialCaption: 'فایلی انتخاب نشده است',
                previewZoomButtonClasses: previewZoomButtonClasses,
                previewZoomButtonIcons: previewZoomButtonIcons
            });
            $('.file-input-ajaxMain').fileinput({
                browseLabel: 'انتخاب فایل',
                uploadUrl: "{{url('/admin/estates/upload')}}",
                uploadAsync: false,
                maxFileCount: 1,
                showUpload: false,
                removeLabel: "حذف همه",
                initialPreview: [],
                browseIcon: '<i class="icon-file-plus mr-2"></i>',
                removeIcon: '<i class="icon-cross2 font-size-base mr-2"></i>',
                browseOnZoneClick: true,
                fileActionSettings: {
                    removeIcon: '<i class="icon-bin"></i>',
                    uploadClass: '',
                    zoomIcon: '<i class="icon-zoomin3"></i>',
                    zoomClass: '',
                    indicatorNew: '<i class="icon-file-plus text-success"></i>',
                    indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
                    indicatorError: '<i class="icon-cross2 text-danger"></i>',
                    indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>',
                },
                layoutTemplates: {
                    icon: '<i class="icon-file-check"></i>',
                    modal: modalTemplate
                },
                initialCaption: 'فایلی انتخاب نشده است',
                previewZoomButtonClasses: previewZoomButtonClasses,
                previewZoomButtonIcons: previewZoomButtonIcons
            });

            $('#btn-modify').on('click', function () {
                $btn = $(this);
                if ($btn.text() == 'Disable file input') {
                    $('#file-input-methods').fileinput('disable');
                    $btn.html('Enable file input');
                    alert('Hurray! I have disabled the input and hidden the upload button.');
                } else {
                    $('#file-input-methods').fileinput('enable');
                    $btn.html('Disable file input');
                    alert('Hurray! I have reverted back the input to enabled with the upload button.');
                }
            });
        };

        return {
            init: function () {
                _componentFileUpload();
            }
        }
    }();
    FileUpload.init();


    var $owlCarousel = $(".owl-carousel");

    if ($owlCarousel.length) {
        $owlCarousel.each(function () {

            var items = parseInt($(this).hasClass("owl-items"), 10);
            if (!items) items = 1;

            var nav = parseInt($(this).attr("data-owl-nav"), 2);
            if (!nav) nav = 0;

            var dots = parseInt($(this).attr("data-owl-dots"), 2);
            if (!dots) dots = 0;

            var center = parseInt($(this).attr("data-owl-center"), 2);
            if (!center) center = 0;

            var loop = parseInt($(this).attr("data-owl-loop"), 2);
            if (!loop) loop = 0;

            var margin = parseInt($(this).attr("data-owl-margin"), 2);
            if (!margin) margin = 0;

            var autoWidth = parseInt($(this).attr("data-owl-auto-width"), 2);
            if (!autoWidth) autoWidth = 0;

            var navContainer = $(this).attr("data-owl-nav-container");
            if (!navContainer) navContainer = 0;

            var autoplay = parseInt($(this).attr("data-owl-autoplay"), 2);
            if (!autoplay) autoplay = 0;

            var autoplayTimeOut = parseInt($(this).attr("data-owl-autoplay-timeout"), 10);
            if (!autoplayTimeOut) autoplayTimeOut = 5000;

            var autoHeight = parseInt($(this).attr("data-owl-auto-height"), 2);
            if (!autoHeight) autoHeight = 0;

            var fadeOut = $(this).attr("data-owl-fadeout");
            if (!fadeOut) fadeOut = 0;
            else fadeOut = "fadeOut";

            var rtl = true;


            if (items === 1) {
                $(this).owlCarousel({
                    navContainer: navContainer,
                    animateOut: fadeOut,
                    autoplayTimeout: autoplayTimeOut,
                    // autoplay: 1,
                    autoheight: autoHeight,
                    center: center,
                    loop: loop,
                    margin: margin,
                    autoWidth: autoWidth,
                    items: 1,
                    nav: nav,
                    dots: dots,
                    rtl: rtl,
                    navText: []
                });
            } else {
                $(this).owlCarousel({
                    navContainer: navContainer,
                    animateOut: fadeOut,
                    autoplayTimeout: autoplayTimeOut,
                    // autoplay: autoplay,
                    autoheight: autoHeight,
                    center: center,
                    loop: loop,
                    margin: margin,
                    autoWidth: autoWidth,
                    items: 1,
                    nav: nav,
                    dots: dots,
                    rtl: rtl,
                    navText: [],
                    responsive: {
                        1368: {
                            items: items
                        },
                        992: {
                            items: 3
                        },
                        450: {
                            items: 2
                        },
                        0: {
                            items: 1
                        }
                    }
                });
            }

            if ($(this).find(".owl-item").length === 1) {
                $(this).find(".owl-nav").css({"opacity": 0, "pointer-events": "none"});
            }

        });
    }


    var $popupImage = $(".popup-image");

    if ($popupImage.length > 0) {
        $popupImage.magnificPopup({
            type: 'image',
            fixedContentPos: false,
            gallery: {enabled: true},
            removalDelay: 300,
            mainClass: 'mfp-fade',
            callbacks: {
                // This prevents pushing the entire page to the right after opening Magnific popup image
                open: function () {
                    $(".page-wrapper, .navbar-nav").css("margin-right", getScrollBarWidth());
                },
                close: function () {
                    $(".page-wrapper, .navbar-nav").css("margin-right", 0);
                }
            }
        });
    }


    $("[data-bg-color], [data-bg-image], [data-bg-pattern]").each(function () {
        var $this = $(this);

        if ($this.hasClass("ts-separate-bg-element")) {
            $this.append('<div class="ts-background">');

            // Background Image

            if ($this.attr("data-bg-image") !== undefined) {
                $this.find(".ts-background").append('<div class="ts-background-image">');
                $this.find(".ts-background-image").css("background-image", "url(" + $this.attr("data-bg-image") + ")");
                $this.find(".ts-background-image").css("background-size", $this.attr("data-bg-size"));
                $this.find(".ts-background-image").css("background-position", $this.attr("data-bg-position"));
                $this.find(".ts-background-image").css("opacity", $this.attr("data-bg-image-opacity"));

                $this.find(".ts-background-image").css("background-size", $this.attr("data-bg-size"));
                $this.find(".ts-background-image").css("background-repeat", $this.attr("data-bg-repeat"));
                $this.find(".ts-background-image").css("background-position", $this.attr("data-bg-position"));
                $this.find(".ts-background-image").css("background-blend-mode", $this.attr("data-bg-blend-mode"));
            }
        } else {

            if ($this.attr("data-bg-image") !== undefined) {
                $this.css("background-image", "url(" + $this.attr("data-bg-image") + ")");

                $this.css("background-size", $this.attr("data-bg-size"));
                $this.css("background-repeat", $this.attr("data-bg-repeat"));
                $this.css("background-position", $this.attr("data-bg-position"));
                $this.css("background-blend-mode", $this.attr("data-bg-blend-mode"));
            }
        }
    });

});
function deleteImage(id) {
    Swal.fire({
        title: 'حذف تصویر',
        text: "آیا از حذف این تصویر اطمینان دارید؟",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'بله! حذفش کن.'
    }).then((result) => {
        if (result.value) {
            window.location.href = '/admin/estate/update/deleteImages/' + id;
        }
    })
}
