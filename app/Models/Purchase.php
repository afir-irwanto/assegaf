<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'purchases';
    protected $fillable = [
        'total_purchase','deleted_at','detail','amount','price'
    ];
}
