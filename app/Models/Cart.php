<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cart
 *
 * @property $id
 * @property $code
 * @property $product_id
 * @property $quant_product
 * @property $subtotal
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @property product $product
 * @property user $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cart extends Model
{
    
    static $rules = [
		'product_id' => 'required',
		'quant_product' => 'required',
		'subtotal' => 'required',
		'provider_id' => 'required',
		'user_id' => 'required',
		'cart_status_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['product_id','quant_product','subtotal','provider_id','user_id','cart_status_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function provider()
    {
        return $this->hasOne('App\Models\Provider', 'id', 'provider_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cartstatus()
    {
        return $this->hasOne('App\Models\CartStatus', 'id', 'cart_status_id');
    }

}
