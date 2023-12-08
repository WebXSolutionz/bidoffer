<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyAuctionWaterViewType extends Model
{
    use HasFactory;


    /**
     * Get the user that owns the PropertyAuctionWaterViewType
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function water_view_types()
    {
        return $this->belongsTo(WaterViewType::class);
    }

    public function property_auction()
    {
        return $this->belongsTo(PropertyAuction::class);
    }

}

