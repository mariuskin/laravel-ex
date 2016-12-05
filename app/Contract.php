<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Contract extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contracts';

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
    protected $fillable = ['start_date', 'end_date', 'file', 'owner_id'];

    
    /**
     * Get the owner that owns the contract.
     */
    public function owner()
    {
        return $this->belongsTo('App\Owner');
    }
    
}
