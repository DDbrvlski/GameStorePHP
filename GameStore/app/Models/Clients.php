<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    const CREATED_AT = "CreationDateTime";
    const UPDATED_AT = "EditDateTime";

    protected $table = "Clients";
    protected $primaryKey = "Id";

    public function orders()
    {
        return $this->hasMany(Orders::class, 'ClientsId');
    }
}
