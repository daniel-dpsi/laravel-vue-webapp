<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $attributes = [
        'Content' => '{
            "order_id": {
            "shipped" : false
            },
            "time": {
            "timezone" : "CEST"
            }
        }'
    ];

    protected $fillable = [

        'Date_of_submission', 'Status'
    ];

    use HasFactory;
}
