<?php

namespace App\Http\Controllers;

use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $model;

    public function __construct(EmployeeRepository $employee)
    {
        $this->model = $employee;
    }

    /**
     * Ejercicio 7
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateSalary()
    {
        try {
            return $this->success($this->model->updateSalary());
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage());
        }
    }
}
