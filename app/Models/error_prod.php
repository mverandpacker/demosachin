<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class error_prod extends Model
{
    use HasFactory;
    protected $table = '_error';
    protected $primarykey = 'id';
}
