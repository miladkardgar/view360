@if($errors->any())
    <div class="error">
        <div class="d-flex flex-column rtl my-2">
            <ul class="text-danger">
                @foreach ($errors->all() as $error)
                    <li>
                        <small>{{ $error }}</small>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
<script src="{{url('/public/assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{url('/public/assets/js/sweet.min.js')}}"></script>
<script>

    $('html, body').animate({
        scrollTop: ($('.error').first().offset().top - 100)
    }, 500);
    Swal.fire({
        type: 'error',
        title: 'خطا!',
        text: 'اطلاعات ارسالی شما کامل نمیباشد. لطفاً بررسی نمایید.',
    });

</script>
