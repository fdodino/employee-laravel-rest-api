<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'isManager',
        'department',
        'employeeNumber',
    ];
}
