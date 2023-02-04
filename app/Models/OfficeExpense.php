<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeExpense extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'unit',
        'descriptopn',
        'price',
        'total_amount',
        'purchase_date',
    ];
}
