<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id',
        'first_name',
        'last_name',
        'salary'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
