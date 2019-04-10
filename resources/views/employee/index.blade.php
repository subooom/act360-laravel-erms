@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Employees</h1>
    <p class="mb-4">Listed below is the list of all employees.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h4>Browse</h4>
          <a href="{{route('employees.create')}}" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Add Employee</a>
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
                                            aria-label="Name: activate to sort column descending" style="width: 185px;">
                                            Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Age: activate to sort column ascending"
                                            style="width: 60px;">Age</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Mobile: activate to sort column ascending"
                                            style="width: 134px;">Mobile</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Employed For: activate to sort column ascending"
                                            style="width: 80px;">Employed For</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Department: activate to sort column ascending"
                                            style="width: 124px;">Department</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Actions: activate to sort column ascending"
                                            style="width: 114px;">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Name</th>
                                        <th rowspan="1" colspan="1">Age</th>
                                        <th rowspan="1" colspan="1">Mobile</th>
                                        <th rowspan="1" colspan="1">Employed For</th>
                                        <th rowspan="1" colspan="1">Department</th>
                                        <th rowspan="1" colspan="1">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                  @foreach($employees as $employee)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{$employee->name}}</td>
                                        <td>{{$employee->dob}}</td>
                                        <td>{{$employee->mobile_number}}</td>
                                        <td>{{$employee->join_date}}</td>
                                        <td>{{$employee->dept_id}}</td>
                                        <td>
                                            <a href="{{ url('/dashboard/employee/show/'.$employee->id) }}"><i class="btn btn-success btn-sm fa fa-eye"> </i></a>
                                            <a href="{{ url('/dashboard/employee/edit/'.$employee->id) }}"><i class="btn btn-primary btn-sm fa fa-edit"> </i></a>

                                            <form action="/dashboard/employee/destroy/{{ $employee['id'] }}" method="post">
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
                                {{ $employees->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
