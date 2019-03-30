<style>
    #mapid{ height: 480px; }
</style>
<div class="card">
    <div class="card-body">
        <div class="row justify-content-md-center">
            <div class="col col-md-3">
                <div class="form-group">
                    <label for="description">نوع معامله</label>
                    <div class="col-12">
                        <select name="transactionType" id="transactionType" required class="form-control">
                            <option value="">انتخاب نمایید.</option>
                            <option value="فروش">فروش</option>
                            <option value="مشارکت">مشارکت</option>
                            <option value="فروش و مشارکت">فروش و مشارکت</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col col-md-3">
                <div class="form-group">
                    <label for="description">شهر</label>
                    <div class="col-12">
                        <select name="city" id="city" class="form-control">
                            @foreach($cityList as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col col-md-3">
                <div class="form-group">
                    <label for="description">منطقه</label>
                    <div class="col-12">
                        <select name="area" id="area" class="form-control">
                        </select>
                    </div>
                </div>
            </div>
            <div class="col col-md-3">
                <div class="form-group">
                    <label for="description">نوع سند</label>
                    <div class="col-12">
                        <select name="docType" id="docType" class="form-control">
                            <option value="">انتخاب نمایید.</option>
                            @foreach($docTypes as $docType)
                                <option value="{{$docType->id}}">{{$docType->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col col-md-3">
                <div class="form-group">
                    <label for="description">کاربری</label>
                    <div class="col-12">
                        <select name="$estateType" id="$estateType" class="form-control">
                            <option value="">انتخاب نمایید.</option>
                            @foreach($estateTypes as $estateType)
                                <option value="{{$estateType->id}}">{{$estateType->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col col-md-3">
                <div class="form-group">
                    <label for="description">متراژ</label>
                    <div class="col-12">
                        <input type="number" class="form-control" min="1" max="10000000" name="dis" id="dis">
                    </div>
                </div>
            </div>
            <div class="col col-md-12">
                <div class="form-group">
                    <label for="description">توضیحات</label>
                    <div class="col-12">
                        <textarea name="description" id="description" cols="30" rows="10"
                                  class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="col col-12">
                <div id="mapid"></div>
                <input type="hidden" name="lat" id="lat" value="">
            </div>
        </div>

    </div>

</div>
<link rel="stylesheet" href="{{ url('public/assets/admin/css/leaflet.css')}}">



<script type="text/javascript" integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
        crossorigin="" src="{{url('public/assets/admin/js/leaflet.js')}}"></script>
<script>


    var mymap = L.map('mapid').setView([36.5122,51.8585], 10);
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWlsYWRrYXJkZ2FyIiwiYSI6ImNqdG9haWp4NTB2dHY0OXBkNmExc3UyZGsifQ.Ys_SvYFAN9ska6SCG7j8gg', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox.streets',
        accessToken: 'pk.eyJ1IjoibWlsYWRrYXJkZ2FyIiwiYSI6ImNqdG9haWp4NTB2dHY0OXBkNmExc3UyZGsifQ.Ys_SvYFAN9ska6SCG7j8gg',
    }).addTo(mymap);



    mymap.on('click',function (e) {
        $(".leaflet-marker-pane").html("");
        $(".leaflet-shadow-pane").html("");
        var marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(mymap);
        marker.bindPopup("<span>موقعیت فایل: </span>" + e.latlng.lat + " | " + e.latlng.lng + "<br>").openPopup();
        $("#lat").val(e.latlng.lat+"_"+e.latlng.lng);
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $("#city").on("change", function () {
        var cID = $(this).val();
        $.ajax({
            url: "{{url('/admin/estates/ajax/getArea')}}",
            data: {id: cID},
            method: "POST",
            success: function (result) {
                $("#area").html("");
                $.each(result, function (i, item) {
                    $("#area").append("<option value='" + item.id + "'>" + item.name + "</option>")
                })
            },
            error() {
                console.log("error get area list");
            }
        })
    })
</script>
