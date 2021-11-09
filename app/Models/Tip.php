<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tip
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
class Tip extends Model
{
    
    static $rules = [
		  'title' => 'required',
		  'content' => 'required',
		  'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
		  'source' => 'required'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','content','image','source'];

}
