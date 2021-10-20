<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Rol
 *
 * @property $id
 * @property $name
 * @property $create_permission
 * @property $update_permission
 * @property $read_permission
 * @property $delete_permission
 * @property $created_at
 * @property $updated_at
 *
 * @property Product[] $products
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Rol extends Model
{
    
    static $rules = [
		'name' => 'required',
		'create_permission' => 'required',
		'update_permission' => 'required',
		'read_permission' => 'required',
		'delete_permission' => 'required'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'create_permission', 'update_permission', 'read_permission', 'delete_permission'];

}
