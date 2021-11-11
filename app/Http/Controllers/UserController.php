<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Provider;
use App\Models\Rol;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Storage;

use File;
/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();

        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $providers= Provider::pluck('name', 'id');
        $rols= Rol::pluck('name', 'id');
        return view('user.create', compact('user','providers','rols'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(User::$rules);

        $input=$request->all();
        
        if ($image = $request->file('image')) {
            $destinationPath = "../storage/app/public/uploads/users/";
            $profileImage = "user_".$request['id'].'_'.$request['rol_id'].'_'.date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        User::create($input);
        

        return redirect()->route('users.index')
            ->with('success', 'user created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $providers= Provider::pluck('name', 'id');
        $rols= Rol::pluck('name', 'id');
        return view('user.edit', compact('user','providers','rols'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate(User::$rules);

        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = "../storage/app/public/uploads/users/";
            $profileImage = "user_".$user['id'].'_'.$user['rol_id'].'_'.date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $user->update($input);

        return view('user.show', compact('user'))
            ->with('success', 'User updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = Users::find($id);
        $image_path = "../storage/app/public/uploads/users/$user->image";
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $user->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
