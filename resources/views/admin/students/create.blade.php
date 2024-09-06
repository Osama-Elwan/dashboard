@extends('admin.layout.master')

@section('content')

<div class="row">
<div class="col-md-12">
    <div class="card">
        @if ($errors->any())

        <alert class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </alert>
        @endif
    <form class="form-horizontal" action="{{ route('users.store') }}" method="post">
        @csrf
        <div class="card-body">
        <div class="form-group row">
            <label
            for="ssn"
            class="col-sm-3 text-end control-label col-form-label"
            >Code</label
            >
            <div class="col-sm-9">
            <input
                type="text"
                class="form-control"
                id="code"
                placeholder="Code Here"
                name="code"
            />
            </div>
        </div>
        <div class="form-group row">
            <label
            for="fname"
            class="col-sm-3 text-end control-label col-form-label"
            >Name</label
            >
            <div class="col-sm-9">
            <input
                type="text"
                class="form-control"
                id="name"
                placeholder=" Name Here"
                name="name"
            />
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
                class="form-control"
                id="email"
                placeholder="Email Here"
                name="email"
            />
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
                class="form-control"
                id="phone"
                placeholder="Phone Here"
                name="phone"
            />
            </div>
        </div>


        <div class="form-group row">
            <label
            for="fname"
            class="col-sm-3 text-end control-label col-form-label"
            >Department</label
            >
            <div class="col-sm-9">
            <select class="form-control" name="department">
                <option value=""></option>
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