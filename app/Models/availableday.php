<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class availableday extends Model
{
    use HasFactory;
    protected $table = 'availabledays';
    protected $primaryKey='availabledayid';
}
