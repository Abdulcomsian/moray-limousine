<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehiclePricing extends Model
{
    protected $table = 'vehiclepricing';

    protected $fillable = ['category_id', 'created_by', 'pricing_type', 'from', 'to', 'is_price_fixed', 'base_price', 'fixed_price'];

    public function vehicle(){
        return $this->belongsTo('App\Vehicle','vehicle_id','id');
    }

    public function pricingBy(){
        if($this->pricing_type == 'DISTANCE'){
            return $this->belongsTo('App\PricingByDistance','pricing_id','id');
        }else{
            return $this->belongsTo('App\PricingByLocation','pricing_id','id');
        }
    }

    public function category(){
        return $this->belongsTo('App\VehicleCategory','category_id','id');
    }

    public function user(){
        return $this->belongsTo('App\User','created_by','id');
    }
}
