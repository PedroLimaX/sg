<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use App\Models\Provider;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Storage;
/**
 * Class CartController
 * @package App\Http\Controllers
 */
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::paginate();

        return view('cart.index', compact('carts'))
            ->with('i', (request()->input('page', 1) - 1) * $carts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cart = new Cart();
        $users= user::pluck('name', 'id');
        $providers= Provider::pluck('name', 'id');
        $products= Product::pluck('name', 'id');
        return view('cart.create', compact('cart','users','providers','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $request->validate(Cart::$rules);

        $input=$request->all();
        
        if ($image = $request->file('image')) {
            $destinationPath = "../storage/app/public/uploads/";
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Cart::create($input);
        

        return redirect()->route('carts.index')
            ->with('success', 'Producto agregado al carrito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $cart = Cart::find($user_id);

        return view('cart.show', compact('cart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cart = Cart::find($id);
        $users= user::pluck('name', 'id');
        $providers= Provider::pluck('name', 'id');
        $products= Product::pluck('name', 'id');
        return view('cart.edit', compact('cart','users','providers','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        $request->validate(Cart::$rules);

        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = "../storage/app/public/uploads/";
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $cart->update($input);

        return redirect()->route('carts.index')
            ->with('success', 'Carrito actualizaco correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cart = Cart::find($id)->delete();
        return redirect()->route('carts.index')
            ->with('success', 'Producto removido correctamente');
    }
}
