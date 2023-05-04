<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelKesehatan extends Model
{
    use HasFactory;
    protected $table = 'kesehatan_jasmani';

    protected $guarded = [];
}
