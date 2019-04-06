<input type="hidden" name="data_id" value="{{$datas->id}}">
<div class="row">
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="transaction_type">نوع معامله</label>
            <div class="col-12">
                <select name="transaction_type" id="transaction_type" required class="form-control">
                    <option value="">انتخاب نمایید.</option>
                    @foreach($transActionTypes as $transAction)
                        <option value="{{$transAction->id}}">{{$transAction->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="province">استان</label>
            <div class="col-12">
                <select name="province" id="province" class="form-control">
                    @foreach($provinceLists as $provinceList)
                        <option value="{{$provinceList->id}}"
                            {{ $provinceList->id === 107 ? 'selected':'' }} >
                            {{$provinceList->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="city_id">شهر</label>
            <div class="col-12">
                <select name="city_id" id="city_id" class="form-control">
                        <option value="">انتخاب نمایید</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="region_id">منطقه</label>
            <div class="col-12">
                <select name="region_id" id="region_id" class="form-control">
                </select>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="ownership_document_status">نوع سند</label>
            <div class="col-12">
                <select name="ownership_document_status" id="ownership_document_status" class="form-control">
                    <option value="">انتخاب نمایید.</option>
                    @foreach($ownerShipDocumentTypes as $ownerShipDocumentType)
                        <option value="{{$ownerShipDocumentType->id}}">{{$ownerShipDocumentType->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="usage_id">کاربری</label>
            <div class="col-12">
                <select name="usage_id" id="usage_id" class="form-control">
                    <option value="">انتخاب نمایید.</option>
                    @foreach($usageTypes as $usageType)
                        <option value="{{$usageType->id}}">{{$usageType->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="area">متراژ</label>
            <div class="col-12">
                <input type="number" class="form-control" min="1" max="10000000" name="area" id="area">
            </div>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="oldArea">متراژ بنای کلنگی</label>
            <div class="col-12">
                <input type="number" class="form-control" min="1" max="10000000" name="oldArea" id="oldArea">
            </div>
        </div>
    </div>

    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="ownerName">نام مالک یا واسط</label>
            <div class="col-12">
                <input type="text" name="ownerName" id="ownerName" class="form-control" required="required">
            </div>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="ownerPhone">شماره تلفن</label>
            <div class="col-12">
                <input type="number" name="ownerPhone" id="ownerPhone" class="form-control">
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="address">آدرس ملک</label>
            <div class="col-12">
                <input type="text" name="address" id="address" class="form-control">
            </div>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="parent_id">نام مجتمع</label>
            <div class="col-12">
                @if(isset($parents) && $parents!="")
                    <select name="parent_id" id="parent_id" class="form-control">
                        <option value="">انتخاب نمایید.</option>
                        @foreach($parents as $parent)
                            <option value="{{$parent->id}}">{{$parent->title}}</option>
                        @endforeach
                    </select>
                    <small class="text-info">اگر چنانچه این فایل مربوط به مجتمع خاصی است لطفاً نام مجتمع را از لیست بالا انتخاب نمایید.</small>
                @else
                    <small>هیچ مجمتع ای در سیستم یافت نشد.</small>
                @endif
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12">
        <div class="form-group">
            <label for="description">توضیحات</label>
            <div class="col-12">
                        <textarea name="description" id="description" cols="30" rows="5"
                                  class="form-control"></textarea>
            </div>
        </div>
    </div>
    <div class="col-12 col-12">
        <div class="form-group">
            <label for="file">بارگزاری تصاویر</label>
            <input type="file" class="file-input-ajax" multiple="multiple" name="file" data-fouc id="file">
            <span class="form-text text-muted">حداکثر ده عکس قابل بارگزاری میباشد.</span>
        </div>
    </div>
    <div class="col-12 col-12">
        <div class="form-group">
            <label for="mapid">موقعیت جغرافیایی</label>
            <div id="mapid"></div>
            <input type="hidden" name="lat" id="lat" value="">
        </div>
    </div>
</div>
<script>
    var mymap = L.map('mapid').setView([36.5122, 51.8585], 10);
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
        $("#lat").val(e.latlng.lat + "_" + e.latlng.lng);
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $("#city_id").on("change", function () {
        var cID = $(this).val();
        $.ajax({
            url: "{{url('/admin/estates/ajax/getArea')}}",
            data: {id: cID},
            method: "POST",
            success: function (result) {
                $("#region_id").html("");
                $.each(result, function (i, item) {
                    $("#region_id").append("<option value='" + item.id + "'>" + item.name + "</option>")
                })
            },
            error() {
                console.log("error get area list");
            }
        })
    })

    $("#province").on("change", function () {
        var pID = $(this).val();
        $.ajax({
            url: "{{url('/admin/estates/ajax/getArea')}}",
            data: {id: pID},
            method: "POST",
            success: function (result) {
                $("#city_id").html("");
                $("#region_id").html("");
                $.each(result, function (i, item) {
                    $("#city_id").append("<option value='" + item.id + "'>" + item.name + "</option>")
                });
                $("#city_id").change();
            },
            error() {
                console.log("error get area list");
            }
        })
    });

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
                uploadUrl: "{{url('/admin/estates/ajax/upload')}}",
                uploadAsync: true,
                maxFileCount: 10,
                initialPreview: [],
                browseIcon: '<i class="icon-file-plus mr-2"></i>',
                uploadIcon: '<i class="icon-file-upload2 mr-2"></i>',
                removeIcon: '<i class="icon-cross2 font-size-base mr-2"></i>',
                browseOnZoneClick: true,
                uploadExtraData: function () {
                    return {
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    };
                },
                fileActionSettings: {
                    removeIcon: '<i class="icon-bin"></i>',
                    uploadIcon: '<i class="icon-upload"></i>',
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

    $('#file').on('fileuploaded', function (event, data, previewId) {
        var id = data.response["id"];
        $("#"+previewId).append("<input type='hidden' name='uploadFile_"+id+"' value='"+id+"'>");
    });
    FileUpload.init();

    $("#province").change();
</script>
