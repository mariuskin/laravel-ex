<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TechnicalInspection extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'technical_inspections';

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
    protected $fillable = ['recent_check', 'dates', 'owner_id', 'car_id'];

    /**
     * Get the owner that owns the technical insperction.
     */
    public function owner()
    {
        return $this->belongsTo('App\Owner');
    }

    /**
     * Get the car that owns the technical inspection.
     */
    public function car()
    {
        return $this->belongsTo('App\Car');
    }
    
}
