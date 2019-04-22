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
