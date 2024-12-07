@if ($errors->any())

<alert class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)

        <li>{{ $error }}</li>
        @endforeach
    </ul>
</alert>
@endif
@if (Session::has('msg'))
    <div class="alert alert-success">{{ Session::get('msg') }}</div>
@endif

{{-- @if (Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif --}}