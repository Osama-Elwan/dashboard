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
          <h5 class="card-title">Basic Datatable</h5>
          <div class="table-responsive">
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
                    <a href="{{ route('users.show',$student->code) }}" class="btn btn-success">Show</a>
                    <a href="{{ route('users.edit',$student->code) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('users.show',$student->code) }}" class="btn btn-danger">Delete</a>
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
