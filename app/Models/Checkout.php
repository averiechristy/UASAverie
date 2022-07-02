<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Checkout extends Model
{
    use HasFactory, SoftDeletes;

  protected $fillable = [
        'user_id',
        'products_id',
        'name',
        'email',
        'phone_number',
        'address',
        'is_paid',
        
    ];

    public function Product(): BelongsTo{
        return $this->belongsTo(Product::class, 'products_id');
    }
}