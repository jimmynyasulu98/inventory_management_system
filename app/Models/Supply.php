<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Supply extends Model
{
    use HasFactory , Notifiable;

    protected $table = 'supplies';
    protected $fillable = [
        'supplier_id',
        'supplierName',
        'item',
        'quantity',
        'size',
        'colour',
        'brand',
        'price'
    ];
}
