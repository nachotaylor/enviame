<?php

namespace App\Http\Controllers;

use App\Repositories\EnvioRepository;

class EnvioController extends Controller
{
    protected $model;

    public function __construct(EnvioRepository $envio)
    {
        $this->model = $envio;
    }

    /**
     * Ejercicio 4
     * @return \Illuminate\Http\JsonResponse
     */
    public function shipment()
    {
        try {
            return $this->success($this->model->shipment());
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage());
        }
    }

    /**
     * Ejercicio 5
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function dividerCount()
    {
        try {
            return $this->model->dividerCount();
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage());
        }
    }

    /**
     * Ejercicio 6
     * @param $count
     * @return \Illuminate\Http\JsonResponse
     */
    public function tracking($count)
    {
        try {
            return $this->model->tracking($count);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage());
        }
    }
}
