<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use App\Models\Roles;
use App\Models\Tickets;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Support\Facades\DB;
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
        $user = new User();
        $areas = Areas::Pluck('nombre_area', 'id');
        $roles = Roles::Pluck('nombre_rol', 'id');
      
        return view('admin.usuarios.create', compact('user', 'areas', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



    public function store(Request $request)
    {
        $request->validate([
           /*  'email' => ['required', 'email', 'unique:users', 'regex:/(.*)@chumbagua\.com$/i'], */
            'email' => ['required', 'email', 'unique:users'],
            'id_area' => ['required', 'int'],
            'id_rol' => ['required', 'int'],
        ]);
        $request->request->add([
           
            'password'=>Hash::make($request->input('password')),
            

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
        $areas = Areas::Pluck('nombre_area', 'id');
        $roles = Roles::Pluck('nombre_rol', 'id');
        $user = User::findOrFail($id);
        return view('admin.usuarios.edit', compact('user', 'areas', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
           /*  'email' => ['required', 'email', 'regex:/(.*)@chumbagua\.com$/i'], */
            'email' => ['required', 'email'],
            'id_area' => ['required', 'int'],
            'id_rol' => ['required', 'int'],

        ]);
        
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
