<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Add_payment extends Model
{
    use HasFactory;
    protected $table = "_addpayment";
    protected $primarykey = "id";
}
