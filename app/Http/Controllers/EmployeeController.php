<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAll()
    {
        return Employee::all();
    }

    public function get(Request $request, int $employeeId)
    {
        return Employee::query()->find($employeeId);
    }

    public function add(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:employees',
        ]);

        $e = new Employee();
        $e->first_name = $request->first_name;
        $e->last_name = $request->last_name;
        $e->email = $request->email;
        $e->save();

        return response()->json(['success' => 'success'], 200);
    }


    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:employees,email,'.$request->id,
        ]);
        $employee = Employee::query()->where('id', $request->id)->first();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->save();

        return response()->json(['success' => 'success'], 200);
    }

    public function delete(Request $request)
    {

        $request->validate([
            'id' => 'required',
        ]);
        Employee::query()->find($request->id)->delete();
        return response()->json(['success' => 'success'], 200);
    }
}
