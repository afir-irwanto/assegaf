<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skin extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'skin';
    protected $fillable = [
        'butcher_id','sheet','total_price','meat_grade','total_meat','deleted_at'
    ];
}
