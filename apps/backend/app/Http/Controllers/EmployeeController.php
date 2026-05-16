<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $employees = Employee::all();
            //select * from employees
            $response = [
                'success' => true,
                'data' => $employees,
                'message' => 'Employees fetched successfully.'
            ];
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while fetching employees.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $validatedData = $request->validate([
                'last_name' => 'required|string|max:100',
                'first_name' => 'required|string|max:100',
                'email' => 'required|email|unique:employees',
                'gender' => 'nullable|string|max:10',
                'birthday' => 'nullable|date',
                'date_hired' => 'required|date',
                'salary' => 'nullable|numeric'
            ]);

            $employee = Employee::create($validatedData);

            return response()->json($employee, 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while saving employees.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        try {
            $employee = Employee::findOrFail($id);
            return response()->json($employee, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while fetching employee.',
                'employee_id' => $id,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $employee = Employee::findOrFail($id);

            $validatedData = $request->validate([
                'last_name' => 'required|string|max:100',
                'first_name' => 'required|string|max:100',
                'email' => 'required|email|unique:employees',
                'gender' => 'nullable|string|max:10',
                'birthday' => 'nullable|date',
                'date_hired' => 'required|date',
                'salary' => 'nullable|numeric'
            ]);

            $employee->update($validatedData);

            return response()->json($employee, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while updating employees.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $employee = Employee::findOrFail($id);
            $employee->delete();

            return response()->json([
                'message' => 'Employee deleted successfully.',
                'employee_id' => $id
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while deleting employees.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
