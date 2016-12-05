<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Run extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'runs';

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
    protected $fillable = ['year', 'first_quarter', 'second_quarter', 'third_quarter', 'fourth_quarter', 'car_id'];

    /**
     * Get the owner that owns the ownership.
     */
    public function car()
    {
        return $this->belongsTo('App\Car');
    }
}
