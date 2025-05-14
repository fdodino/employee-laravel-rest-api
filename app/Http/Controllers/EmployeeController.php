<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\EmployeeService;
use App\Models\Employee;

class EmployeeController extends Controller
{
    private EmployeeService $service;

    public function __construct()
    {
        $this->service = new EmployeeService();
    }

    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 10);
        $employees = $this->service->paginate($perPage);
        return response()->json($employees);
    }

    public function show($id)
    {
        $employee = $this->service->find($id);
        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }
        return response()->json($employee);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'isManager' => 'required|boolean',
            'department' => 'required|string',
            'employeeNumber' => 'required|integer',
        ]);
        $employee = $this->service->create($data);
        return response()->json($employee, 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'sometimes|required|string',
            'isManager' => 'sometimes|required|boolean',
            'department' => 'sometimes|required|string',
            'employeeNumber' => 'sometimes|required|integer',
        ]);
        $employee = $this->service->update($id, $data);
        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }
        return response()->json($employee);
    }

    public function destroy($id)
    {
        $deleted = $this->service->delete($id);
        if (!$deleted) {
            return response()->json(['message' => 'Employee not found'], 404);
        }
        return response()->json(['message' => 'Employee deleted']);
    }
}
