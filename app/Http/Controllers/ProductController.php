<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slider;
use App\Models\ImageProduct;
use App\Models\Provider;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use File;


/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter=$request->get('search');
        $category=$request->get('category');
        if($filter){
            $products = Product::where('name','like',"%$filter%")
            ->orWhere('key_words','like',"%$filter%")
            ->orWhere('description','like',"%$filter%")
            ->orWhere('maker','like',"%$filter%")->paginate(12);
        }
        else if($category){
            $products = Product::where('category_id','like',"$category")->paginate(12);
        }
        else{
            $products = Product::paginate(12);
        }
        $sliders=Slider::paginate();
        return view('product.index', compact('products','category','filter', 'sliders'))
            ->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    }


    public function offers(){
        $products = Product::where('discount', '>', 0)->paginate(16);
        return view('product.offers', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        $categories= Category::pluck('name', 'id');
        $providers= Provider::pluck('name', 'id');
        return view('product.create', compact('product','categories','providers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Product::$rules);
        $input=$request->all();
        if ($image = $request->file('image')) {
            $destinationPath = "../storage/app/public/uploads/product/";
            $profileImage = "product_".$request($id).date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Product::create($input);
        

        return redirect()->route('products.index')
            ->with('success', 'product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $imageproducts = ImageProduct::where('product_id', $id)->get();
        return view('product.show', compact('product', 'imageproducts'));
    }

    public function addtocart(Request $request, $id)
    {
        $product = Product::find($id);
        $cart = DB::table('carts')->insert([
            'code' => $product['id'].$product['provider_id'].Auth::user()->id.$request->quant_product,
            'product_id'=> $product['id'],
            'quant_product'=>$request->quant_product,
            'subtotal'=>($product['normal_price']*$request->quant_product),
            'provider_id'=>$product['provider_id'],
            'user_id'=>Auth::user()->id,
            'cart_status_id'=>1
        ]);
        return redirect()->route('carts.index', compact('cart'))
        ->with('success', "Producto agregado al carrito");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories= Category::pluck('name', 'id');
        $providers= Provider::pluck('name', 'id');
        return view('product.edit', compact('product','categories','providers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate(Product::$rules);

        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = "../storage/app/public/uploads/product/";
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $product->update($input);

        return redirect()->route('products.index')
            ->with('success', 'product updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $image_path = "../storage/app/public/uploads/imageproducts/$product->image";
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $product->delete();
        return redirect()->route('products.index')
            ->with('success', 'product deleted successfully');
    }

    public function importForm(){
        return view('product.import-form');
    }
    public function import(Request $request){
        $request->validate([
            'csv-file' => 'required|mimes:csv'
        ]);
        Product::where('provider_id', Auth::user()->provider_id)->update(array('imported' => 0));
        Excel::import(new ProductImport,request()->file('csv-file'));
        Product::where('imported',0)->delete();
        return redirect()->route('providers.index')
            ->with('success', 'Inventario Actualizado Correctamente');
    }   
}