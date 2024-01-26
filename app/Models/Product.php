<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";
    protected $primaryKey = "id_product";
    protected $fillable = [
        "nama_product",
        "description_product",
        "stock_amount",
        "id_supplier",
        "status",
    ];

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, "id_supplier");
    }
}
