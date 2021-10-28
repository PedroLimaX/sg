<?php

namespace App\Http\Controllers;

use App\Models\CartStatus;
use App\Models\Product;
use App\Models\User;
use App\Models\Provider;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Storage;
/**
 * Class CartStatusController
 * @package App\Http\Controllers
 */
class CartStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartstatuses = CartStatus::paginate();
        return view('cart.index', compact('cartstatuses'))
            ->with('i', (request()->input('page', 1) - 1) * $cartstatuses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cartstatus = new CartStatus();
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
    public function store(Request $request, Product $product_id)
    {
        
        
        $request->validate(CartStatus::$rules);

        $input=$request->all();
        $input['product_id'] = "$product_id";
        CartStatus::create($input);
        

        return redirect()->route('cartstatuses.index')
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
        $cartstatus = CartStatus::find($user_id);
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
        $cartstatus = CartStatus::find($id);
        $users= user::pluck('name', 'id');
        $providers= Provider::pluck('name', 'id');
        $products= Product::pluck('name', 'id');
        return view('cart.edit', compact('cart','users','providers','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CartStatus $cartstatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartStatus $cartstatus)
    {
        $request->validate(CartStatus::$rules);

        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = "../storage/app/public/uploads/";
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $cartstatus->update($input);

        return redirect()->route('cartstatuses.index')
            ->with('success', 'Carrito actualizaco correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cartstatus = CartStatus::find($id)->delete();
        return redirect()->route('cartstatuses.index')
            ->with('success', 'Producto removido correctamente');
    }
}
