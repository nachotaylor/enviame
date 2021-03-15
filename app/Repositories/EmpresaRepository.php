<?php

namespace App\Repositories;

use App\Models\Empresa;
use App\Repositories\Base\BaseRepository;
use Exception;
use Faker\Factory;

class EmpresaRepository extends BaseRepository
{
    protected $model;

    public function __construct(Empresa $empresa)
    {
        $this->model = $empresa;
    }

    /**
     * @param $id
     * @throws Exception
     */
    private function validateId($id)
    {
        if (!(integer)$id) {
            throw new Exception('Ingrese un número inválido.');
        }
    }

    /**
     * @param $n
     * @return string
     * @throws Exception
     */
    public function store($n)
    {
        $this->validateId($n);
        $faker = Factory::create();
        for ($i = 0; $i <= $n; $i++) {
            $data = [
                'name' => $faker->company,
                'cuit' => $faker->unique()->bothify('##-########-#'),
                'type' => $faker->randomElement(['Logistica', 'Distribuidor']),
                'start_activity' => $faker->date('Y-m-d', 'today'),
                'country' => $faker->country,
                'city' => $faker->city,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'mail' => $faker->unique()->safeEmail,
            ];
            $this->model->create($data);
        }
        return "Empresa creada.";
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function modify(array $data = [], $id)
    {
        $this->validateId($id);
        $user = $this->findOrFail($id);
        return $user->update($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function remove($id)
    {
        $this->validateId($id);
        $user = $this->findOrFail($id);
        return $user->delete();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        $this->validateId($id);
        return $this->model->where('id', $id)->first();
    }
}
