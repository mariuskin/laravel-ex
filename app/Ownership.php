<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ownership extends Model
{
    
    use EnumTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ownerships';

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
    protected $fillable = ['type_of_ownership', 'car_id'];


    /**
     * Get the car that owns the ownership.
     */
    public function car()
    {
        return $this->belongsTo('App\Car');
    }
}
