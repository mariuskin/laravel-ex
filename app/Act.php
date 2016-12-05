<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Act extends Model
{
    use EnumTrait;
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'acts';

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
    protected $fillable = ['status', 'file', 'owner_id'];

    public function act()
	{
		return $this->belongsTo('App\Owner');
	}
	
}
