<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    
    use EnumTrait;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sections';

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
    protected $fillable = ['name', 'description', 'department_id'];

    public function department()
	{
		return $this->belongsTo('App\Department');
	}
	
}
