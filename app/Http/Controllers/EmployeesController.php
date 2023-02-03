<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;

class EmployeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $employees = Employees::all();
        return response()->json([
            'status' => 'success',
            'employees' => $employees,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'salary' => 'required',
        ]);

        $employee = Employees::create([
            'name' => $request->name,
            'salary' => $request->salary,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Employee created successfully',
            'employee' => $employee,
        ]);
    }

    public function show($id)
    {
        $employee = Employees::find($id);
        return response()->json([
            'status' => 'success',
            'employee' => $employee,
        ]);
    }
}
