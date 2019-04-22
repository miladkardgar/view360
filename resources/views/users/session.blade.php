@if(session('result'))
    <script src="{{url('/public/assets/js/sweet.min.js')}}"></script>
    <script>
        Swal.fire({
            position: 'top-end',
            type: '{{Session::get("result")}}',
            title: '{{Session::get("message")}}',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
@endif
