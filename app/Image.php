<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'images';

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
    protected $fillable = ['file', 'car_id'];


    /**
     * Get the car that owns the image.
     */
    public function car()
    {
        return $this->belongsTo('App\Car');
    }

}
