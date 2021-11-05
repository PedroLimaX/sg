<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @property $id
 * @property $code
 * @property $name
 * @property $description
 * @property $specs
 * @property $image
 * @property $price
 * @property $stock
 * @property $max_per_order
 * @property $materials
 * @property $maker
 * @property $provider_id
 * @property $category_id
 * @property $created_at
 * @property $updated_at
 *
 * @property category $category
 * @property providere $providere
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Product extends Model
{
    
    static $rules = [
		'code' => 'required',
		'name' => 'required',
		'key_words' => 'required',
		'description' => 'required',
		'specs' => 'required',
		'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		'normal_price' => 'required',
		'discount' => 'required',
		'final_price' => 'required',
		'stock' => 'required',
		'max_per_order' => 'required',
		'materials' => 'required',
		'maker' => 'required',
		'provider_id' => 'required',
		'category_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['code','name','key_words','description','specs','image','normal_price','discount','final_price','stock','max_per_order','materials','maker','provider_id','category_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne('App\Models\category', 'id', 'category_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function provider()
    {
        return $this->hasOne('App\Models\provider', 'id', 'provider_id');
    }

    public function imageproduct()
    {
        return $this->hasMany('App\Models\ImageProduct', 'product_id', 'id');
    }
}
