<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    const CREATED_AT = "CreationDateTime";
    const UPDATED_AT = "EditDateTime";

    protected $table = "Products";
    protected $primaryKey = "Id";

    public function Genre()
    {
        return $this->belongsTo(Genre::class, 'GenreId');
    }

    public function Platform()
    {
        return $this->belongsTo(Platform::class, 'PlatformId');
    }

    public function Developer()
    {
        return $this->belongsTo(Developer::class, 'DeveloperId');
    }

    public function OrderDetails()
    {
        return $this->hasMany(OrderDetails::class, 'ProductId');
    }
}
