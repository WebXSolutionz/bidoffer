<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyAuction extends Model
{
    use HasFactory;

    public function terms()
    {
        return $this->hasOne(PropertyAuctionTerm::class);
    }

    public function bedroom()
    {
        return $this->belongsTo(Bedroom::class);
    }

    public function bathroom()
    {
        return $this->belongsTo(Bathroom::class);
    }

    public function property_type()
    {
        return $this->hasMany(PropertyAuctionPropertyType::class);
    }

    public function fee_includes()
    {
        return $this->hasMany(PropertyAuctionFeeInclude::class);
    }

    public function appliance()
    {
        return $this->hasMany(PropertyAuctionAppliance::class);
    }

    public function water_extra()
    {
        return $this->hasMany(PropertyAuctionWaterExtra::class);
    }

    public function water_view_types()
    {
        return $this->hasMany(PropertyAuctionWaterViewType::class);
    }

    public function fuel()
    {
        return $this->hasMany(PropertyAuctionFuel::class);
    }

    public function ac_types()
    {
        return $this->hasMany(PropertyAuctionAcType::class);
    }

    public function financing()
    {
        return $this->hasMany(PropertyAuctionFinancing::class);
    }

    public function media()
    {
        return $this->hasMany(PropertyAuctionMedia::class);
    }

    public function mediaImages()
    {
        return $this->hasMany(PropertyAuctionMedia::class)->where('media_type','image');
    }

    public function firstImage()
    {
        return $this->hasOne(PropertyAuctionMedia::class)->where('media_type','image');
    }

    public function bids()
    {
        return $this->hasMany(PropertyAuctionBid::class)->orderBy('price','desc');
    }
}
