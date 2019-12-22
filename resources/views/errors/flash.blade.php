@if(Session::has('success'))
    <p class="alert-box success">{{ Session::get('success') }}</p>
@endif