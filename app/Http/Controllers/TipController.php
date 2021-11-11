<?php

namespace App\Http\Controllers;

use App\Models\Tip;
use Illuminate\Http\Request;

use File;

/**
 * Class TipController
 * @package App\Http\Controllers
 */
class TipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tips = Tip::paginate();

        return view('tip.index', compact('tips'))
            ->with('i', (request()->input('page', 1) - 1) * $tips->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tip= new Tip();
        return view('tip.create', compact('tip'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Tip::$rules);

        $input=$request->all();
        
        if ($image = $request->file('image')) {
            $destinationPath = "../storage/app/public/uploads/tips/";
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        Tip::create($input);
        return redirect()->route('tips.index')
            ->with('success', 'tip creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tip= Tip::find($id);

        return view('tip.show', compact('tip'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tip= Tip::find($id);
        return view('tip.edit', compact('tip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tips $tip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tip $tip)
    {
        request()->validate(Tip::$rules);

        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = "../storage/app/public/uploads/tips/";
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $tip->update($input);

        return redirect('tips')
            ->with('success', 'tip actualizado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tip = Tip::find($id);
        $image_path = "../storage/app/public/uploads/tips/$tip->image";
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $tip->delete();
        return redirect()->route('tips.index')
            ->with('success', 'Tip eliminado correctamente');
    }
}
