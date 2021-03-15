<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateEmpresaRequest;
use App\Repositories\EmpresaRepository;

class EmpresaController extends Controller
{
    protected $model;

    public function __construct(EmpresaRepository $empresa)
    {
        $this->model = $empresa;
    }

    /**
     * Ejercicio 2
     * @param $count
     * @return \Illuminate\Http\JsonResponse
     */
    public function create($count)
    {
        try {
            return $this->success($this->model->store($count));
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage());
        }
    }

    /**
     * Ejercicio 2
     * @param UpdateEmpresaRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateEmpresaRequest $request, $id)
    {
        try {
            return $this->success($this->model->modify($request->all(), $id));
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage());
        }
    }

    /**
     * Ejercicio 2
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        try {
            return $this->success($this->model->remove($id));
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage());
        }
    }

    /**
     * Ejercicio 2
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        try {
            return $this->success($this->model->get($id));
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage());
        }
    }
}
