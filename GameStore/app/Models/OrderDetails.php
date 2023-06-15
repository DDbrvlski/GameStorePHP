<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    const CREATED_AT = "CreationDateTime";
    const UPDATED_AT = "EditDateTime";

    protected $table = "OrderDetails";
    protected $primaryKey = "Id";

    public function orders()
    {
        return $this->belongsTo(Orders::class, 'OrderId');
    }

    public function products()
    {
        return $this->belongsTo(Products::class, 'ProductId');
    }
}
