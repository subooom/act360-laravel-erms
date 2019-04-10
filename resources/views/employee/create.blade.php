@extends('layouts.dashboard')

@section('content')

  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Employees</h1>
    <p class="mb-4">Add an employee to your database.</p>
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
    <form action="{{url('dashboard/employee/store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group"><label class="col-sm-2 control-label">Name</label>
          <div class="col-sm-10"><input type="text" class="form-control" name="name" placeholder="Name"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label" for="exampleFormControlSelect1">Department</label>
          <div class=" col-sm-10">
            <select class="form-control" id="exampleFormControlSelect1" name="dept_id">
              @foreach($departments as $dept)
                <option value="{{$dept->id}}">{{$dept->title}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group"><label class="col-sm-2 control-label">DOB</label>
          <div class="col-sm-10"><input name="dob" style="width: 100%;border-radius: 5px;border: 1px solid #d1d3e2;
        " data-toggle="datepicker"></div>
        </div>
        <div class="form-group"><label class="col-sm-2 control-label">Gender</label>
          <div class="col-sm-10"><input type="text"class="form-control" name="gender" placeholder="Gender"></div>
        </div>
        <div class="form-group"><label class="col-sm-2 control-label">Mobile</label>
          <div class="col-sm-10"><input type="text"class="form-control" name="mobile_number" placeholder="Mobile number"></div>
        </div>

        <div class="form-group"><label class="col-sm-2 control-label">Address</label>
          <div class="col-sm-10"><input type="text"class="form-control" name="address" placeholder="Address"></div>
        </div>

        <div class="form-group"><label class="col-sm-2 control-label">Profile Pic</label>
          <div class="col-sm-10"><input type="file" class="form-control" name="photo" placeholder="Profile Pic"></div>
        </div>
        <div class="form-group"><label class="col-sm-2 control-label">Current Salary</label>
          <div class="col-sm-10"><input type="text"class="form-control" name="current_salary" placeholder="Current Salary"></div>
        </div>

        <div class="form-group"><label class="col-sm-2 control-label">Join Date</label>
          <div class="col-sm-10"><input name="join_date" style="width: 100%;border-radius: 5px;border: 1px solid #d1d3e2;
            " data-toggle="datepickerjoin"></div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Remark</label>
          <div class="col-sm-10">
            <textarea rows="5" cols="50" class="form-control" name="remark" placeholder="Remark"></textarea>
          </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <div class="col-sm-4 col-sm-offset-2">
              <a href="{{route('employees.browse')}}" class="btn btn-info">Go Back</a>
              <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </div>
    </form>
  </div>

  <script src="/jquery.min.js"></script>
  <link  href="/datepicker-master/dist/datepicker.css" rel="stylesheet">
  <script src="/datepicker-master/dist/datepicker.js"></script>
  {{-- <script>
      $('[data-toggle="datepicker"]').datepicker({
        format: 'dd-mm-yyyy',
        startView: 2,
      });
      $('[data-toggle="datepickerjoin"]').datepicker({
        format: 'dd-mm-yyyy',
        startView: 2,
      });
  </script> --}}
@endsection