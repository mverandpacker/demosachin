<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laptopRepair extends Model
{
    use HasFactory;
    protected $table = 'repair';
    protected $primarykey = 'id';
}
