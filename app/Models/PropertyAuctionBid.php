<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyAuctionBid extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the PropertyAuctionBid
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function property_auction()
    {
        return $this->belongsTo(PropertyAuction::class);
    }

    public function financing()
    {
        return $this->belongsTo(Financing::class);
    }
}
