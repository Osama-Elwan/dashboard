@extends('admin.layout.master')

@section('content')

<div class="row">
<div class="col-md-12">
    {{-- show messeges --}}
    <x-show-messages></x-show-messages>
    <form class="form-horizontal" action="{{ route('users.update',$student->code) }}" method="post">
        @csrf
        @method('put')
        <div class="card-body">

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
                value="{{ $student->name }}"
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
                value="{{ $student->email }}"

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
                value="{{ $student->phone }}"

            />
            @error('phone')
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
            <select class="form-control" name="department">
                @foreach ($dapartments as $dapartment)

                <option value="{{ $dapartment->dept_num }}"
                    @if ($dapartment->dept_num  == $student->dept_id)

                    selected
                    @endif

                    >{{ $dapartment->dept_name }}</option>
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