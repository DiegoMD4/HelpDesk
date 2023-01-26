<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;
use Iluminate\Contracts\View\View as ViewContract;

class RolesController extends Controller
{
    
    public function index()  
    {
        $datos['roles'] = Roles::paginate(10);
        return view('admin.roles.index', $datos);
    }

   
    public function create()
    {
        return view('admin.roles.create');
    }

   
    public function store(Request $request)
    {
        $campos_requeridos = [
            'roles' => ['require', 'string', 'max: 255'],
        ];
        $alert = [
            'require' => ':attribute es requerido'
        ];

        $this->validate($request, $campos_requeridos, $alert);

        $datos_roles = request()->except('_token');
        Roles::insert($datos_roles);

        return redirect('roles')->with('mensaje', 'Elemento creado');

    }

   
    /* public function show(Roles $roles)
    {
        
    } */

    
    public function edit($id)
    {
        $rol = Roles::findOrFail($id);
        return view('admin.roles.edit', compact('rol'));
    }

    
    public function update(Request $request, $id)
    {
        $campos_requeridos = [
            'roles' => ['require', 'string', 'max: 255'],
        ];
        $alert = [
            'require' => ':attribute es requerido'
        ];

        $this->validate($request, $campos_requeridos, $alert);

        $datos_roles = request()->except(['_token', '_method']);
        Roles::where('id', '=', $id)->update($datos_roles);

        $roles = Roles::findOrFail($id);
        return redirect('roles')->with('mensaje', 'Elemnto borrado');
    }

    
    public function destroy($id)
    {
        Roles::destroy($id);
        return redirect('roles')->with('mensaje', 'Elemnto borrado');
    }
}
