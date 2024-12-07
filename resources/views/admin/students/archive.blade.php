    @extends('admin.layout.master')
    @section('tabel-style')
    <link
    href="{{ asset('dashboard/assets') }}/css/dataTables.bootstrap4.css"
    rel="stylesheet"
    />
    @endsection
    @section('content')



    <div class="row">
    <div class="col-12">
    <div class="card">
    <div class="card-body">
        @if (Session::has('msg'))
        <div class="alert alert-success">{{ Session::get('msg') }}</div>
    @endif
        <h5 lass="card-title">Basic Datatable</h5>
        <div clacss="table-responsive">
        <table
            id="zero_config"
            class="table table-striped table-bordered"
        >
            <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>

            </tr>
            </thead>
            <tbody>

            @foreach ($data as $student)

            <tr>
                <td>{{ $student->code }}</td>
                <td>{{ $student->name }}</td>

                <td>
                    <form action="{{ route('users.restore',$student->code) }}" method="post" class="d-inline">
                    @csrf
                    <input type="submit" value="restore" class="btn btn-success">
                    </form>

                    <form action="{{ route('users.forceDelete',$student->code) }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    <input type="submit" value="delete" class="btn btn-danger">
                    </form>
                    {{-- <a href="{{ route('users.show',$student->code) }}" class="btn btn-danger">Delete</a> --}}

                </td>

            </tr>
            @endforeach


            </tbody>

        </table>
        </div>
    </div>
    </div>
    </div>
    </div>


    @endsection

    @section('table-scripts')
    <!-- this page js -->
    <script src="{{ asset('dashboard/assets') }}/js/datatables.min.js"></script>
    <script>
    /****************************************
    *       Basic Table                   *
    ****************************************/
    $("#zero_config").DataTable();
    </script>
    @endsection
