<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cart
 *
 * @property $id
 * @property $name
 * @property $details
 * @property $created_at
 * @property $updated_at
 *
 * @property product $product
 * @property user $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CartStatus extends Model
{
    
    static $rules = [
		'name' => 'required',
		'details' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','details'];

}
