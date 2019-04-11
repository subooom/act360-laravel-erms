@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Departments</h1>
    <p class="mb-4">Listed below is the list of all Departments.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h4>Browse</h4>
          <a href="{{route('department.create')}}" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Add a department</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                                role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending" style="width: 120px;">
                                            Name</th>
                                          <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                              colspan="1" aria-label="Age: activate to sort column ascending"
                                              >Description</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                              colspan="1" aria-label="Age: activate to sort column ascending"
                                              style="width: 150px;">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Name</th>
                                        <th rowspan="1" colspan="1">Description</th>
                                        <th rowspan="1" colspan="1">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($departments as $department)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{$department->title}}</td>
                                        <td>{{$department->description}}</td>
                                        <td>
                                            <a href="{{ url('/dashboard/department/edit/'.$department->id) }}"><i class="btn btn-primary btn-sm fa fa-edit"> </i></a>
                                            <form action="/dashboard/department/destroy/{{ $department['id'] }}" method="post">
                                              {{ csrf_field() }}
                                              {{ method_field('DELETE') }}
                                              <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></button>
                                            </form>
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
    </div>

</div>
@endsection
