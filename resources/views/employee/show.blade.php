@extends('layouts.dashboard')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{$employee->name}}</h1>
    <p class="mb-4">{{$employee->dob}}</p>
    <p class="mb-4">{{$employee->gender}}</p>
    <p class="mb-4">{{$employee->mobile_number}}</p>
    <img class="float-right" style="position:relative" src="/storage/imgs/employees/{{$employee->photo}}" alt="">
</div>
@endsection