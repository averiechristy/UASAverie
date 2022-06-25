<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Chekcout extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'products_id',
        'name',
        'emai',
        'phone number',
        'is_paid',
        
    ];
}
