<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'lease_id',
        'amount_paid',
        'payment_date',
        'payment_method'
    ];

    // Relationship: A payment is tied to exactly one Lease
    public function lease()
    {
        return $this->belongsTo(Lease::class);
    }
}