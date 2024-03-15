<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessTarget extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'business_id',
        'product_id',
        'category',
        'weight',
        'start_date',
        'end_date',
        'status',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
