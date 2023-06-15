<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;

    const CREATED_AT = "CreationDateTime";
    const UPDATED_AT = "EditDateTime";

    protected $table = "Developer";
    protected $primaryKey = "Id";

    public function products()
    {
        return $this->hasMany(Products::class, 'DeveloperId');
    }
}
