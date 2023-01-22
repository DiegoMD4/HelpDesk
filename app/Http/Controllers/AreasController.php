<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\View\View as ViewContract; 
use Illuminate\Http\Request;
use App\Models\Areas;

class AreasController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): ViewContract
    {
        $datos['users'] = Areas::paginate(10);
        return view('admin.areas.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): ViewContract
    {
        return view('admin.areas.create');
    }

    
    public function store(Request $request)
    {
        $campos_requeridos = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'area' => ['required', 'string', 'max:255'],
        ];
        $alert = [
            'required' => ' :attribute es requerido'
        ];

        $this->validate($request, $campos_requeridos, $alert);

        $datos_usuario = request()->except('_token');
        Areas::insert($datos_usuario);

        return redirect('admin')->with('mensaje', 'Usuario creado');
    }

   
    public function show(Admin $admin)
    {
        
    }

    public function edit(Admin $admin)
    {
        
    }

   
    public function update(Request $request, Admin $admin)
    {
        
    }

   
     
    public function destroy(Admin $admin)
    {
        
    }
}
