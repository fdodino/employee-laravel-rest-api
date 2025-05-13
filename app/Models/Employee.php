<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

/**
 * Employee Model
 *
 * @property string $name
 * @property bool $isManager
 * @property string $department
 * @property int $employeeNumber
 * @property string $email
 * @property float $salary
 * @property string $position
 * @property \Carbon\Carbon $hire_date
 */
class Employee extends Model
{
    protected $fillable = [
        'name',
        'isManager',
        'department',
        'employeeNumber',
        'email',
        'salary',
        'position',
        'hire_date',
    ];

    protected $casts = [
        'isManager' => 'boolean',
        'employeeNumber' => 'integer',
        'salary' => 'float',
        'hire_date' => 'date',
    ];
}

