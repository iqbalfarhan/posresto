<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'items',
        'desc',
        'price',
        'done',
    ];

    protected function casts()
    {
        return [
            'items' => 'array'
        ];
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
