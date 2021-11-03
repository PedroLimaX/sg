<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Provider
 *
 * @property $id
 * @property $title
 * @property $description
 * @property $image
 * @property $created_at
 * @property $updated_at
 *
 * @property Product[] $products
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ImageProduct extends Model
{
    
    static $rules = [
		'title' => 'required',
		'description' => 'required',
		'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','description','image'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'product_id', 'id');
    }
    

}
