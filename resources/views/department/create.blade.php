@extends('layouts.dashboard')

@section('content')

  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Departments</h1>
    <p class="mb-4">Add a department to your database.</p>
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
    <form action="{{url('dashboard/department/store')}}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group"><label class="col-sm-2 control-label">Name</label>
          <div class="col-sm-10"><input type="text" class="form-control" name="name" placeholder="Name"></div>
        </div>

        <div class="hr-line-dashed"></div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Description</label>
          <div class="col-sm-10">
            <textarea rows="5" cols="50" class="form-control" name="description" placeholder="Description"></textarea>
          </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <div class="col-sm-4 col-sm-offset-2">
              <a href="{{route('department.browse')}}" class="btn btn-info">Go Back</a>
              <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </div>
    </form>
  </div>

  <link rel="stylesheet" href="/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css">
  <script src="/jquery.min.js"></script>
  <script src="/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script>
    document.querySelectorAll('#datetimepicker').datetimepicker({
        format: 'yyyy-mm-dd'
    });
  </script>
@endsection