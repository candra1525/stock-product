<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = "suppliers";
    protected $fillable = [
        "nama_supplier"
    ];

    protected $primaryKey = "id_supplier";

    public function products()
    {
        return $this->hasMany(Product::class, "id_supplier");
    }
}
