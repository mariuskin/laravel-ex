<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{

    use EnumTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cars';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['brand_model', 'state_number', 'fabrication_year', 'oil_type', 'gps', 'owner_id'];

    /**
     * Get the runs for the car.
     */
    public function runs()
    {
        return $this->hasMany('App\Run');
    }

    /**
     * Get the technical inspections for the car.
     */
    public function technical_inspections()
    {
        return $this->hasMany('App\TechnicalInspection');
    }

     /**
     * Get the Images of the car.
     */
    public function images()
    {
        return $this->hasMany('App\Image');
    }

    /**
     * Get the owner that owns the car.
     */
    public function owner()
    {
        return $this->belongsTo('App\Owner');
    }

    /**
     * Get the ownership record associated with the car.
     */
    public function ownership()
    {
        return $this->hasOne('App\Ownership');
    }


}
