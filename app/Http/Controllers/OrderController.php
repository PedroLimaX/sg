<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Http\Request;



use App\Mail\NotifyMailable;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


/**
 * Class OrderController
 * @package App\Http\Controllers
 */
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $orders = Order::paginate();
        $carts=Cart::paginate();
        $products= Product::paginate();
        $providers= Provider::paginate();
        return view('order.index', compact('orders','carts','products','providers'))
            ->with('i', (request()->input('page', 1) - 1) * $orders->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet);

        for ($i=0; $i < 5; $i++) {
            $token .= $codeAlphabet[random_int(0, $max-1)];
        }
        $orders = DB::table('orders')->insert([
            'code' => date('Ymd').Auth::user()->id.$token,
            'subtotal'=> DB::table('carts')->where('user_id', Auth::user()->id)->where('cart_status_id', 1)->sum('subtotal'),
            'total'=> DB::table('carts')->where('user_id', Auth::user()->id)->where('cart_status_id', 1)->sum('subtotal'),
            'user_id' => Auth::user()->id,
        ]);
        $carts=DB::table('carts')
            ->where('cart_status_id', 1 and 'user_id', Auth::user()->id)
            ->update(['cart_status_id' => 2, 'code'=> date('Ymd').Auth::user()->id.$token]);

        $provider_id=DB::table('carts')->where('cart_status_id', 2)->where('user_id', Auth::user()->id)->distinct()->pluck('provider_id');
        foreach($provider_id as $provider=>$id){
            $provider_data=DB::table('providers')->where('id', $id)->pluck('email');
            $email = new NotifyMailable(date('Ymd').Auth::user()->id.$token);
            Mail::to($provider_data)->send($email);
        }
        /*$client_data=DB::table('users')->where('id', Auth::user()->id)->select('email', 'name')->get();
        $order_data=DB::table('orders')->where('user_id', Auth::user()->id)->get();
        $email = new NotifyMailable(date('Ymd').Auth::user()->id.$token);
        Mail::to($provider_data)->send($email);*/

        return redirect()->route('orders.index')->with('success', "Pedido realizado correctamente");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $request->validate(Order::$rules);

        $input=$request->all();
        
        if ($image = $request->file('image')) {
            $destinationPath = "../storage/app/public/uploads/";
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Order::create($input);
        

        return redirect()->route('orders.index')
            ->with('success', 'Pedido realizado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);

        return view('order.show', compact('Order'));
    }
    
    public function doOrder()
    { 
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet);

        for ($i=0; $i < 3; $i++) {
            $token .= $codeAlphabet[random_int(0, $max-1)];
        }
        
        return redirect()->view('carts.index')
        ->with('success', "Pedido realizado correctanmente");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        $users= Category::pluck('name', 'id');
        $carts= Provider::pluck('code', 'id');
        return view('order.edit', compact('Order','users','carts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $request->validate(Order::$rules);

        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = "../storage/app/public/uploads/";
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $order->update($input);

        return redirect()->route('orders.index')
            ->with('success', 'Pedido actualizado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $order = Order::find($id)->delete();
        return redirect()->route('orders.index')
            ->with('success', 'Pedido cancelado correctamente');
    }
}
