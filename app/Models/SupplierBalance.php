<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SupplierBalance extends Model
{
    use HasFactory , Notifiable;

    protected $table = 'supplier_balances';
    protected $fillable = [
        'supplier_id',
        'supplierName',
        'balance'

    ];
}
