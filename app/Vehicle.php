<?php
declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vehicle extends Model
{
    protected $table = 'vehicles';


    /** Fill ables Array
     * @var array
     */
    protected $fillable = ['title','plate','model_no','vehicleCategory_id',
        'standard','interior_color','exterior_color','exterior_color',
        'length','engine_capacity','short_description','is_available','creator_id','transmission',
        'status','image_name','fuel_type'];

    /**
     * @return BelongsTo
     */
    public function vehicleCategory(){
        return $this->belongsTo('App\VehicleCategory','vehicleCategory_id','id');
    }

    /**
     * @return BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\User','creator_id','id');
    }

    /**
     * @return BelongsToMany
     */
    public function booking(){
        return $this->belongsToMany(Booking::class, 'booking_vehicle',
            'vehicle_id', 'booking_id')
            ->withPivot('status','assigned_at', 'booking_date');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documents(){
        return $this->hasMany(UploadedDocument::class);
    }
    /**
     * @return BelongsToMany
     */
    public function locations(){
        return $this->belongsToMany(Location::class, 'location_vehicle',
            'vehicle_id', 'location_id')
            ->withTimestamps();
    }

    /**
     * @param $formData
     * @param $locations
     * @return mixed
     */
    public function createNewVehicle($formData , $locations){
      $vehicle =  $vehicle = $this::create($formData);
        foreach ($locations as $location){
            $vehicle->locations()->attach($location);
        }
        return $vehicle;
    }


    /**
     * @param $formData
     * @param $id
     * @param $locations
     */
    public function updateVehicle($formData,$id , $locations){
        $vehicle =  $this::find($id);
        $vehicle->locations()->detach();
        foreach ($locations as $location){
            $vehicle->locations()->attach($location);
        }
        $this::where('id',$id)->update($formData);
    }

}
