<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sales extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'sales';
    protected $fillable = [
        'quantity','price','total_price','deleted_at','item','customer'
    ];
}
