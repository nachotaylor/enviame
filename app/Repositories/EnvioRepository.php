<?php

namespace App\Repositories;

use App\Models\Envio;
use App\Repositories\Base\BaseRepository;
use Carbon\Carbon;
use GuzzleHttp\Client;

class EnvioRepository extends BaseRepository
{
    protected $model;
    protected $client;

    public function __construct(Envio $envio, Client $client)
    {
        $this->model = $envio;
        $this->client = $client;
    }

    public function shipment()
    {
        $header = ['Accept' => 'application/json', 'api-key' => 'ea670047974b650bbcba5dd759baf1ed'];
        $body = [
            "shipping_order" => [
                "n_packages" => "1",
                "content_description" => "ORDEN 255826267",
                "imported_id" => "255826267",
                "order_price" => "24509.0",
                "weight" => "0.98",
                "volume" => "1.0",
                "type" => "delivery"
            ],
            "shipping_origin" => [
                "warehouse_code" => "401"
            ],
            "shipping_destination" => [
                "customer" => [
                    "name" => "Bernardita Tapia Riquelme",
                    "email" => "b.tapia@outlook.com",
                    "phone" => "977623070"
                ],
                "delivery_address" => [
                    "home_address" => [
                        "place" => "Puente Alto",
                        "full_address" => "SAN HUGO 01324, Puente Alto, Puente Alto"
                    ]
                ]
            ],
            "carrier" => [
                "carrier_code" => "",
                "tracking_number" => ""
            ]
        ];
        $payload = ['headers' => $header, 'body' => json_encode($body)];
        $response = $this->client->post("https://stage.api.enviame.io/api/s2/v2/companies/401/deliveries", $payload);
        return $response->getBody()->getContents();
    }

    private function fibonacci($range)
    {
        if ($range < 2) {
            return $range;
        }
        return $this->fibonacci($range - 1) + $this->fibonacci($range - 2);
    }

    public function dividerCount()
    {
        $i = $divisors = 0;
        while ($divisors <= 1000) {
            $divisors = 0;
            $fibonacci = $this->fibonacci($i);
            for ($n = 2; $n <= sqrt($fibonacci); $n++) {
                if ($fibonacci % $n == 0) {
                    for ($j = 1; $j <= $fibonacci; $j++) {
                        if ($fibonacci % $j == 0) {
                            $divisors++;
                        }
                    }
                }
            }
            $i++;
        }
        echo $divisors . " " . $fibonacci;
        return $fibonacci;
    }

    public function tracking($count)
    {
        for ($i = 0; $i < $count; $i++) {
            $distance = rand(0, 2000);
            $range = intdiv($distance, 100);
            $days = $this->fibonacci($range);
            if ($distance < 100) {
                $days = 0;
            }
            echo "El envio será entregado en $days días\n";
        }
    }
}
