<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    // GET /departments
    public function index()
    {
        return response()->json(Department::all());
    }

    // POST /departments
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'location' => 'nullable|string',
        ]);

        $department = Department::create($request->all());
        return response()->json($department, 201);
    }

    // GET /departments/{id}
    public function show(Department $department)
    {
        return response()->json($department);
    }

    // PUT /departments/{id}
    public function update(Request $request, Department $department)
    {
        $department->update($request->all());
        return response()->json($department);
    }

    // DELETE /departments/{id}
    public function destroy(Department $department)
    {
        $department->delete();
        return response()->json(['message' => 'Department deleted']);
    }
}
