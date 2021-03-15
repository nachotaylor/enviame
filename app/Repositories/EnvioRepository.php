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

    public function countPalindrome()
    {
        $string = "afoolishconsistencyisthehobgoblinoflittlemindsadoredbylittlestatesmenandphilosophersanddivineswithconsistencyagreatsoulhassimplynothingtodohemayaswellconcernhimselfwithhisshadowonthewallspeakwhatyouthinknowinhardwordsandtomorrowspeakwhattomorrowthinksinhardwordsagainthoughitcontradicteverythingyousaidtodayahsoyoushallbesuretobemisunderstoodisitsobadthentobemisunderstoodpythagoraswasmisunderstoodandsocratesandjesusandlutherandcopernicusandgalileoandnewtonandeverypureandwisespiritthatevertookfleshtobegreatistobemisunderstood";
        $count = 0;
        for ($i = 0; $i < strlen($string); $i++) {
            if ($this->equal(substr($string, $i))) {
                $count++;
            }
        }
        return $count;
    }

    private function equal($string)
    {
        if (strlen($string) < 2) {
            return false;
        }
        return strcmp($string, strrev($string)) == 0 ? true : $this->equal(substr($string, 0, -1));
    }

    public function shipment()
    {
        $header = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'api-key' => 'ea670047974b650bbcba5dd759baf1ed'
        ];
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
                "carrier_code" => "BLX",
                "tracking_number" => ""
            ]
        ];
        $payload = ['headers' => $header, 'body' => json_encode($body)];
        $response = $this->client->post("https://stage.api.enviame.io/api/s2/v2/companies/401/deliveries", $payload);
        $data = json_decode($response->getBody()->getContents())->data;
        return $this->model->create([
            'shipment_id' => $data->identifier,
            'imported_id' => $data->imported_id,
            'tracking_number' => $data->tracking_number,
            'status_id' => $data->status->id,
            'customer_name' => $data->customer->full_name,
            'customer_phone' => $data->customer->phone,
            'shipping_address' => $data->shipping_address->full_address,
            'shipping_place' => $data->shipping_address->place,
            'shipping_country' => $data->country,
            'carrier' => $data->carrier,
            'service' => $data->service,
            'barcodes' => $data->barcodes,
            'deadline_at' => $data->deadline_at
        ]);
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
        return $fibonacci;
    }

    public function tracking($count)
    {
        for ($i = 0; $i < $count; $i++) {
            $distance = rand(0, 2000);
            $range = intdiv($distance, 100);
            $days = $distance < 100 ? 0 : $this->fibonacci($range);
            echo "El envio será entregado en $days días\n";
        }
    }
}
