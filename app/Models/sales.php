<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sales extends Model
{
    use HasFactory;
    protected $table = "sales";
    protected $fillable = [
        "name",
        "quantity",
        "rate",
        "total",
        "invoice_id",
        "date"
    ];
}
