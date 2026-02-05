<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'hire_date',
        'job_title',
        'status',
        'department_id'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }
}
