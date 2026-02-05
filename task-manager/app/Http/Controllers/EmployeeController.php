<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // GET /employees
    public function index()
    {
        return response()->json(Employee::all());
    }

    // POST /employees
    public function store(Request $request)
    {
        $request->validate([
            'first_name'    => 'required|string',
            'last_name'     => 'required|string',
            'email'         => 'required|email|unique:employees,email',
            'job_title'     => 'required|string',
            'department_id' => 'required|integer',
            'status'        => 'required|string',
        ]);

        $employee = Employee::create($request->all());
        return response()->json($employee, 201);
    }

    // GET /employees/{id}
    public function show(Employee $employee)
    {
        return response()->json($employee);
    }

    // PUT /employees/{id}
    public function update(Request $request, Employee $employee)
    {
        $employee->update($request->all());
        return response()->json($employee);
    }

    // DELETE /employees/{id}
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json(['message' => 'Employee deleted']);
    }
}
