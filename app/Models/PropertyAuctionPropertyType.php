<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyAuctionPropertyType extends Model
{
    use HasFactory;

    // protected $with = ['type'];

    public function property_type()
    {
        return $this->belongsTo(PropertyType::class);
    }

    public function property_auction()
    {
        return $this->belongsTo(PropertyAuction::class);
    }
}
