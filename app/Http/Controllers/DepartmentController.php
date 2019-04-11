<?php

namespace App\Http\Controllers;

use App\Model\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $departments = Department::paginate(5);

      return view('department.index')->with('departments', $departments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function validateForm($request){
      $this->validate($request, [
        'name' => 'bail|required|max:255',
        'description' => 'required'
      ]);
    }


    public function store(Request $request)
    {
      $this->validateForm();
      // Create department
      $department = new Department;
      $department->title = $request->input('name');
      $department->description = $request->input('description');

      $department->save();

      return redirect('/dashboard/department/browse');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $Department = Department::find($id);

      return view('department.show')->with('department', $department);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $department = Department::find($id);

      return view('department.edit')->with('department', $department);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validateForm($request);

      $department = Department::find($id);
      $department->title = $request->input('name');
      $department->description = $request->input('description');
      $department->save();

      return redirect('/dashboard/department/browse');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $department = Department::find($id);


      $department->delete();

      return redirect('/dashboard/department/browse');
    }
}
