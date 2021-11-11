<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Slider
 *
 * @property $id
 * @property $title
 * @property $image
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Slider extends Model
{
    
    static $rules = [
		  'title' => 'required',
		  'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','image'];

}
