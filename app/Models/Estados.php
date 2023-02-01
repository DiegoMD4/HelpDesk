<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estados
 *
 * @property $id
 * @property $tipo_estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Tickets[] $tickets
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Estados extends Model
{
    
    static $rules = [
		'tipo_estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo_estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany('App\Models\Tickets', 'id_estado', 'id');
    }
    

}
