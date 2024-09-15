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
              {{-- <thead>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Department</th>
                </tr>
              </thead> --}}
              <tbody>



                <tr>
                    <th>code</th>
                    <td>{{ $student->code }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $student->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $student->email }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $student->phone }}</td>
                </tr>
                <tr>
                    <th>Department</th>
                    <td>{{  $student->department->dept_name; }}</td>
                </tr>
                <tr>
                    <th>Tablet</th>
                    <td>{{  $student->tablet->tablet_name; }}</td>
                </tr>







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
