<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Company;
use Illuminate\Http\Request;
use App\Http\Requests;

class Employees extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null)
    {
        if ($id == null) {
            return Employee::orderBy('id', 'asc')->get();
        } else {
            return $this->show($id);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        $employee = new Employee;

        $employee->company_id = $request->input('company_id');
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->contact_number = $request->input('contact_number');
        $employee->position = $request->input('position');
        $employee->save();

        return 'Employee record successfully created with id ' . $employee->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        return Employee::find($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $employee = Employee::find($id);

        $employee->company_id = $request->input('company_id');
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->contact_number = $request->input('contact_number');
        $employee->position = $request->input('position');
        $employee->save();

        return "Sucess updating user #" . $employee->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id) {
        $employee = Employee::find($id);

        $employee->delete();

        return "Employee record successfully deleted #" . $request->input('id');
    }


    public function findCompanyEmployees($id) {
        $employees = Company::find($id)->employees;
        if ($employees) {
            return $employees;
        } else {
            return response()->json(['error' => 'Id does not exist']);
        }
    }

    public function findEmployeeCompany($id) {
        $company = Employee::find($id)->company;
        if ($company) {
            return $company;
        } else {
            return response()->json(['error' => 'Id does not exist']);
        }
    }
}
