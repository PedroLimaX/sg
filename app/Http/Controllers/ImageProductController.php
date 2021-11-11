<?php

namespace App\Http\Controllers;

use App\Models\ImageProduct;
use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use File;
/**
 * Class ImageProductController
 * @package App\Http\Controllers
 */
class ImageProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imageproducts = ImageProduct::paginate();
        return view('imageproduct.index', compact('imageproducts'))
            ->with('i', (request()->input('page', 1) - 1) * $imageproducts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $imageproduct= new ImageProduct();
        $products= Product::where('provider_id', Auth::user()->provider_id)->pluck('sku', 'id');
        return view('imageproduct.create', compact('imageproduct','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ImageProduct::$rules);
        $input=$request->all();
        
        if ($image = $request->file('image')) {
            $destinationPath = "../storage/app/public/uploads/imageproducts/";
            $profileImage = 'imageproduct_'.date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        ImageProduct::create($input);
        $product=DB::table('products')
            ->where('id', $input['product_id'])
            ->where('image', 'like', 'sg_default.png')
            ->update(['image' => $input['image']]);

        return redirect()->route('imageproducts.index')
            ->with('success', 'Imagen creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $imageproduct= ImageProduct::find($id);

        return view('imageproduct.show', compact('imageproduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $imageproduct= ImageProduct::find($id);
        $products= Product::where('provider_id', Auth::user()->provider_id)->pluck('sku', 'id');
        return view('imageproduct.edit', compact('imageproduct','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ImageProducts $imageproduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImageProduct $imageproduct)
    {
        request()->validate(ImageProduct::$rules);

        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = "../storage/app/public/uploads/imageproducts/";
            $profileImage = "product_".$imageproduct['id'].'_'.date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $imageproduct->update($input);

        return redirect('imageproducts')
            ->with('success', 'Imagen actualizada correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $imageproduct = ImageProduct::find($id);
        $image_path = "../storage/app/public/uploads/imageproducts/$imageproduct->image";
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $imageproduct->delete();
        return redirect()->route('imageproducts.index')
            ->with('success', 'Imagen eliminada correctamente');
    }
}
