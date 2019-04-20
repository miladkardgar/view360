@if(session('result'))
    <script src="{{url('/public/assets/js/sweet.min.js')}}"></script>
    <script>
        Swal.fire({
            type: '{{Session::get('result')}}',
            text: '{{Session::get('message')}}',
        },function (result) {
            console.log(result);
        });

    </script>
@endif
