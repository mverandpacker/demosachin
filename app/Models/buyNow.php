<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buyNow extends Model
{
    use HasFactory;
    protected $table = "_buy_product";
    protected $primarykey = "id";
}
