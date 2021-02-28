<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Stock extends Model
{

    use HasFactory , Notifiable;

    protected $table = 'stocks';
    protected $fillable = [
        'item',
        'quantity',
        'size',
        'colour',
        'brand',
        'price_each',
        'imagePath'
    ];
}
