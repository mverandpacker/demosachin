<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vendorproduct extends Model
{
    use HasFactory;
    protected $table = 'vendor_product';
    protected $primarykey = 'id';
}
