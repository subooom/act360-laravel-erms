<?php

namespace App\Http\Controllers;

use App\Model\Employee;
use App\Model\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $employees = Employee::paginate(5);

      foreach($employees as $emp){
        $emp->dept = Department::find($emp->dept_id)->first()->title;
      }

      return view('employee.index')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $departments = Department::all();
      return view('employee.create')->with('departments', $departments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'name' => 'bail|required|max:255',
        'dob' => 'required',
        'gender' => 'required',
        'mobile_number' => 'required',
        'address' => 'required|min:3',
        'photo' => 'image|max:1999',
        'current_salary' => 'required',
        'join_date' => 'required',
        'remark' =>'required',
        'dept_id' => 'required'
      ]);

      // Handle File Upload
      if($request->hasFile('photo')){
        // Get filename with the extension
        $filenameWithExt = $request->file('photo')->getClientOriginalName();
        // Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension = $request->file('photo')->getClientOriginalExtension();
        // Filename to store
        $headerImageNameToStore= $filename.'_'.time().'.'.$extension;
        // Upload Image
        $path = $request->file('photo')->storeAs('public/imgs/employees/', $headerImageNameToStore);
      } else {
        $headerImageNameToStore = 'noimage.jpg';
      }

      // Create employee
      $employee = new Employee;
      $employee->name = $request->input('name');
      $employee->dob = $request->input('dob');
      $employee->gender = $request->input('gender');
      $employee->mobile_number = $request->input('mobile_number');
      $employee->address = $request->input('address');
      $employee->photo = $headerImageNameToStore;
      $employee->current_salary = $request->input('current_salary');
      $employee->join_date = $request->input('join_date');
      $employee->current_salary = $request->input('current_salary');
      $employee->about = $request->input('remark');
      $employee->dept_id = $request->input('dept_id');

      $employee->save();

      return redirect('/dashboard/employees/browse');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $employee = Employee::find($id);

      return view('employee.show')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $employee = Employee::find($id);

      return view('employee.edit')->with('employee', $employee);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $employee = Employee::find($id);

      if($employee->photo != null){
          // Delete Image
          Storage::delete('public/imgs/employees/'.$employee->photo);
      }

      $employee->delete();
      return redirect('/dashboard/employees/browse');
    }
}
