<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalSkin extends Model
{
    use HasFactory;

    protected $table = 'total_skin';
    protected $fillable = [
        'total_skin'
    ];
}
