{{-- way one --}}
{{-- @props(['type','message'])
<div class="alert alert-{{ $type }}">{{ $message }}</div> --}}
{{-- way two --}}
@props(['type'])
<div class="alert alert-{{ $type }}">
    {{ $slot }}
</div>
{{-- <div class="alert alert-{{ $type }}"> --}}
    {{-- userName --}}
    {{-- {{ $slot }} --}}
{{-- </div> --}}

{{-- @props(['type', 'username'])  <!-- No capitalization errors here --> --}}

{{-- <div class="alert alert-{{ $type }}"> --}}
    {{-- {{ $username }} <!-- This should now work since $username is passed from the parent --> --}}
    {{-- {{ $slot }} <!-- This is the content inside the <x-alert> component --> --}}
{{-- </div> --}}

