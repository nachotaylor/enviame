<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Envio extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipment_id',
        'imported_id',
        'tracking_number',
        'status_id',
        'customer_name',
        'customer_phone',
        'shipping_address',
        'shipping_place',
        'shipping_country',
        'carrier',
        'service',
        'barcodes',
        'deadline_at',
    ];
}
