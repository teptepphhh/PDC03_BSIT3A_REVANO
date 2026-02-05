<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    // GET /salaries
    public function index()
    {
        return response()->json(Salary::all());
    }

    // POST /salaries
    public function store(Request $request)
    {
        $request->validate([
            'employee_id'    => 'required|integer',
            'base_salary'    => 'required|numeric',
            'bonus'          => 'nullable|numeric',
            'tax'            => 'nullable|numeric',
            'effective_from' => 'required|date',
            'effective_to'   => 'nullable|date',
        ]);

        $salary = Salary::create($request->all());
        return response()->json($salary, 201);
    }

    // GET /salaries/{id}
    public function show(Salary $salary)
    {
        return response()->json($salary);
    }

    // PUT /salaries/{id}
    public function update(Request $request, Salary $salary)
    {
        $salary->update($request->all());
        return response()->json($salary);
    }

    // DELETE /salaries/{id}
    public function destroy(Salary $salary)
    {
        $salary->delete();
        return response()->json(['message' => 'Salary deleted']);
    }
}
