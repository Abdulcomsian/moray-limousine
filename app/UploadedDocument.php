<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadedDocument extends Model
{
  protected $table ='uploadeddocuments';

  protected $fillable = ['document_title','document_img','document_value','user_id','vehicle_id','document_status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
  public function user(){
      return $this->hasOne(User::class);
  }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
  public function vehicle(){
      return $this->hasOne(Vehicle::class);
  }

    /**
     * @param $form_data
     * @return bool
     */
  public function saveDocuments($form_data){
      if (isset($form_data)){
          $form_data['user_id'] = auth()->id();
       $document = $this->create($form_data);
          return $document;
      }
      return false;
      }


    /**
     * @param $form_data
     * @param $vehicle_id
     * @return bool
     */
    public function saveVehicleDocuments($form_data , $vehicle_id){
        if (isset($form_data)){
            $form_data['vehicle_id'] = $vehicle_id;
            $document = $this->create($form_data);
            return $document;
        }
        return false;
    }

    /**
     * @param $form_data
     */
      public function updateDocument($form_data,$id){
          if (isset($form_data)){
              $form_data['user_id'] = auth()->id();
              $this->where('id',$id)->update($form_data);
          }
      }

    public function updateVehicleDocument($form_data,$id,$vehicle_id){
        if (isset($form_data)){
            $form_data['vehicle_id'] = $vehicle_id;
            $this->where('id',$id)->update($form_data);
        }
    }



}
