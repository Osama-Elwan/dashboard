@extends('admin.layout.master')
@section('content')
{{-- way one --}}
{{-- <x-alert type='success' message='welcome'></x-alert> --}}
{{-- <x-alert type='success' message='<strong>welcome</strong>'></x-alert> --}}
{{-- <x-alert type='danger' message='bye'></x-alert>
<x-alert type='info' message='hello'></x-alert>
<x-alert type='secondary' message='good night'></x-alert> --}}

{{-- way two --}}
@php
    $username = 'osama';
@endphp

{{-- <x-alert type='success' :username="$username">
    <strong>alert 1</strong>
</x-alert> --}}
<x-alert type='success' :username="$username">
    <strong>alert 1</strong>
</x-alert>


<x-alert type='danger'>
    <h1>alert 2</h1>
</x-alert>
<x-alert type='info' ></x-alert>
<x-alert type='secondary' ></x-alert>

@endsection