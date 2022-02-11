<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteCompanyRequest;
use App\Http\Requests\IndexCompanyRequest;
use App\Http\Requests\ShowCompanyRequest;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexCompanyRequest $request)
    {
        return Employee::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request){
        $emp = Employee::create($request->validated());
        return response()->json([
            'message' => 'Employee Created Successfully',
            'Employee' => $emp
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(ShowCompanyRequest $request,Employee $employee){
        return $employee;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee){
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, Employee $employee){
        $updated = $employee->update($request->validated());
        return response()->json([
            'message' => 'Employee Updated Successfully',
            'Employee' => $updated
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteCompanyRequest $request,Employee $employee)
    {
        if ($employee->delete())
        return response()->json(['message' => "Employee Deleted"]);
    }
}
