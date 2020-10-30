<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cuisine extends Model
{
    use HasFactory;
    protected $table="cuisines";
    protected $primaryKey = 'cuisineid';
}
