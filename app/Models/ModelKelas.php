<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelKelas extends Model
{
    use HasFactory;
    protected $table = 'class';

    protected $guarded = [];
}
