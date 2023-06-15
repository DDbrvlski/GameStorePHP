<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    const CREATED_AT = "CreationDateTime";
    const UPDATED_AT = "EditDateTime";

    protected $table = "Genre";
    protected $primaryKey = "Id";

    public function Products()
    {
        return $this->hasMany(Products::class, 'GenreId');
    }

}
