<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddMoney extends Model
{
    use HasFactory;
    protected $table = '_repair_money';
    protected $primarykey = 'id';
}
