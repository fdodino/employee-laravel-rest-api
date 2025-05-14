<?php

namespace App\Repositories;

use App\Models\Employee;

class EmployeeRepository
{
    public function paginate($perPage = 10)
    {
        return Employee::paginate($perPage);
    }
    

    public function all(): array
    {
        return Employee::all()->toArray();
    }

    public function find(string $id): ?Employee
    {
        return Employee::find($id);
    }

    public function create(array $data): Employee
    {
        return Employee::create($data);
    }

    public function update(string $id, array $data): ?Employee
    {
        $employee = Employee::find($id);
        if ($employee) {
            $employee->update($data);
        }
        return $employee;
    }

    public function delete(string $id): bool
    {
        $employee = Employee::find($id);
        if ($employee) {
            return $employee->delete();
        }
        return false;
    }
}
