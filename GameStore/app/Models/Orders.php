<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    const CREATED_AT = "CreationDateTime";
    const UPDATED_AT = "EditDateTime";

    protected $table = "Orders";
    protected $primaryKey = "Id";

    public function clients()
    {
        return $this->belongsTo(Clients::class, 'ClientsId');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'OrderId');
    }
}
