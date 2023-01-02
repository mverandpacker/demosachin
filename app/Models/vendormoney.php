<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vendormoney extends Model
{
    use HasFactory;
    protected $table = 'vendor_money';
    protected $primarykey = 'id';
}
