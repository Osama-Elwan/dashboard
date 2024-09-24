@extends('admin.layout.master')

@section('content')

<div class="row">
<div class="col-md-12">
    <div class="card">
       
        {{-- @if (Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif --}}
    <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('users.store') }}" method="post" >
        @csrf
        <div class="card-body">
        <div class="form-group row">
            <label
            for="ssn"
            class="col-sm-3 text-end control-label col-form-label "
            >Code</label
            >
            <div class="col-sm-9">
            <input
                type="text"
                class="form-control @error('code') is-invalid @enderror"
                id="code"
                placeholder="Code Here"
                name="code"
                value="{{ old('code') }}"
            />
            @error('code')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
        </div>
        <div class="form-group row">
            <label
            for="name"
            class="col-sm-3 text-end control-label col-form-label "
            >Name</label
            >
            <div class="col-sm-9">
            <input
                type="text"
                class="form-control @error('name') is-invalid @enderror"
                id="name"
                placeholder=" Name Here"
                name="name"
                value="{{ old('name') }}"

            />
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
        </div>

        <div class="form-group row">
            <label
            for="email"
            class="col-sm-3 text-end control-label col-form-label"
            >Email</label
            >
            <div class="col-sm-9">
            <input
                type="email"
                class="form-control @error('email') is-invalid @enderror"
                id="email"
                placeholder="Email Here"
                name="email"
                value="{{ old('email') }}"

            />
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
        </div>
        <div class="form-group row">
            <label
            for="email"
            class="col-sm-3 text-end control-label col-form-label"
            >Phone</label
            >
            <div class="col-sm-9">
            <input
                type="text"
                class="form-control @error('phone') is-invalid @enderror"
                id="phone"
                placeholder="Phone Here"
                name="phone"
                value="{{ old('phone') }}"

            />
            @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
        </div>


        <div class="form-group row">
            <label
            for="phone"
            class="col-sm-3 text-end control-label col-form-label"
            >Photo</label
            >
            <div class="col-sm-9">
            <input
                type="file"
                class="form-control @error('photo') is-invalid @enderror"
                id="photo"

                name="photo"
                value="{{ old('photo') }}"

            />
            @error('photo')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
        </div>





        <div class="form-group row">
            <label
            for="fname"
            class="col-sm-3 text-end control-label col-form-label"
            >Department</label
            >
            <div class="col-sm-9">
            <select class="form-control" name="dept_id">
                @foreach ($dapartments as $dapartment)

                <option value="{{ $dapartment->dept_num }}">{{ $dapartment->dept_name }}</option>
                @endforeach
            </select>
            </div>
        </div>
        </div>
        <div class="border-top">
        <div class="card-body">
            <button type="submit" class="btn btn-primary">
            Add
            </button>
        </div>
        </div>
    </form>
    </div>
</div>
</div>
@endsection