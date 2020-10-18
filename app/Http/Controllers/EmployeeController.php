<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::all();
        return view('employee.allemployee', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name'=>'required|max:25|min:4',
            'email' => 'required|unique:employees',
            'phone' => 'required|unique:employees|max:11|min: 11',
        ]);
        //create model
        $employee = new Employee;
        //catch data
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->save();

        return Redirect('employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::findorfail($id);
        return view('employee.viewemployee', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findorfail($id);
        return view('employee.editemployee', compact('employee'));
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
        $validation = $request->validate([
            'name'=>'required|max:25|min:4',
            'email' => 'required',
            'phone' => 'required|max:11|min: 11',
        ]);

         $employee = Employee::findorfail($id);
         //catch data
         $employee->name = $request->name;
         $employee->email = $request->email;
         $employee->phone = $request->phone;
         $employee->save();
 
         return Redirect()->to('employee');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findorfail($id);
        $employee->delete();
        return Redirect()->back();
    }
}
