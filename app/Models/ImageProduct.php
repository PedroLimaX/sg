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
		'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
    'product_id'=>'required'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','description','image','product_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
    

}
