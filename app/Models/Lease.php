<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lease extends Model
{
    use HasFactory;

    // These are the columns your database allows Laravel to fill
    protected $fillable = [
        'tenant_id',
        'property_id',
        'start_date',
        'end_date',
        'rent_amount',
        'status'
    ];

    // Relationship: A lease belongs to exactly one Tenant
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    // Relationship: A lease belongs to exactly one Property
    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    // Relationship: A lease can have many Payments
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}