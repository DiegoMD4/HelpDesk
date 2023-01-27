<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    
    public function index(): ViewContract
    {
        $datos['users'] = User::paginate(10);
        return view('admin.usuarios.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): ViewContract
    {
        return view('admin.usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



    public function store(Request $request)
    {
        $request->request->add([
           
            'password'=>Hash::make($request->input('password'))

        ]);
        User::create($request->all());

        return redirect('admin')->with('mensaje', 'Usuario creado');
    }

   
    public function show(User $user)
    {
        //
    }

    
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.usuarios.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->merge([
           
            'password'=>Hash::make($request->input('password')),
            

        ]);
        $datos_user = request()->except(['_token', '_method', 'password_confirmation']);
        User::where('id','=',$id)->update($datos_user);

        return redirect('admin')->with('mensaje', 'Usuario editado');
    }

    
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('admin')->with('mensaje', 'Elemento borrado');
    }

    
}
