<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class currentstate extends Model
{
    use HasFactory;
    protected $table = "currentstates";
    protected $primaryKey = "currentstateid";
}
