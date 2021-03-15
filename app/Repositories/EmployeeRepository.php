<?php

namespace App\Repositories;

use App\Models\Employee;
use App\Repositories\Base\BaseRepository;
use Exception;

class EmployeeRepository extends BaseRepository
{
    protected $model;

    public function __construct(Employee $employee)
    {
        $this->model = $employee;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function updateSalary()
    {
        return $this->model
            ->with('country.continent')
            ->where('salary', '<=', 5000)
            ->get()
            ->each(function ($employee) {
                $employee->salary += ($employee->salary * $employee->country->continent->anual_adjustment / 100);
                $employee->save();
            });
    }
}
