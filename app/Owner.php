<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'owners';

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
    protected $fillable = ['first_name', 'last_name', 'email', 'section_id'];

    /**
     * Get the ownerships for the Owner.
     */
    public function ownerships()
    {
        return $this->hasMany('App\Ownership');
    }

    /**
     * Get the contracts for the Owner.
     */
    public function contracts()
    {
        return $this->hasMany('App\Contract');
    }

    /**
     * Get the acts for the Owner.
     */
    public function acts()
    {
        return $this->hasMany('App\Act');
    }

    /**
     * Get the technical inspections for the Owner.
     */
    public function technical_inspections()
    {
        return $this->hasMany('App\TechnicalInspection');
    }

    /**
     * Get the cars for the Owner.
     */
    public function cars()
    {
        return $this->hasMany('App\Car');
    }

    /**
     * Get the user that owns the owner.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the section that owns the owner.
     */
    public function section()
    {
        return $this->belongsTo('App\Section');
    }
}
