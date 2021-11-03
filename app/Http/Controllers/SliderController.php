<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

/**
 * Class SliderController
 * @package App\Http\Controllers
 */
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::paginate();

        return view('slider.index', compact('sliders'))
            ->with('i', (request()->input('page', 1) - 1) * $sliders->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slider= new Slider();
        return view('slider.create', compact('slider'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Slider::$rules);

        $input=$request->all();
        
        if ($image = $request->file('image')) {
            $destinationPath = "../storage/app/public/uploads";
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        Slider::create($input);
        return redirect()->route('sliders.index')
            ->with('success', 'Slider creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slider= Slider::find($id);

        return view('slider.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider= Slider::find($id);

        return view('slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Sliders $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        request()->validate(Slider::$rules);

        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = "../storage/app/public/uploads";
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $slider->update($input);

        return redirect('sliders')
            ->with('success', 'Slider actualizado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $slider = Slider::find($id)->delete();

        return redirect()->route('sliders.index')
            ->with('success', 'Slider eliminado correctamente');
    }
}
