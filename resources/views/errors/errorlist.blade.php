@if($errors->any())
    @foreach($errors->all() as $error)
        <p class="alert-box alert">{{ $error }}</p>
    @endforeach
@endif