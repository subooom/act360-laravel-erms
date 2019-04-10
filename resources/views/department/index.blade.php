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
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="dataTable_length"><label>Show <select
                                        name="dataTable_length" aria-controls="dataTable"
                                        class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> entries</label></div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search"
                                        class="form-control form-control-sm" placeholder=""
                                        aria-controls="dataTable"></label></div>
                        </div>
                    </div>
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
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1
                                to 10 of 57 entries</div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                {{$departments->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
