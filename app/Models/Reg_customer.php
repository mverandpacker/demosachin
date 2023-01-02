<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reg_customer extends Model
{
    use HasFactory;
    protected $table = '_customer';
    protected $primarykey = 'id';
}
