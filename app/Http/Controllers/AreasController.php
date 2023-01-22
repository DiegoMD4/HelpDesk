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
        $datos['areas'] = Areas::paginate(10);
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
            'nombre_area' => ['required', 'string', 'max:255'],
        ];
        $alert = [
            'required' => ' :attribute es requerido'
        ];

        $this->validate($request, $campos_requeridos, $alert);

        $datos_area = request()->except('_token');
        Areas::insert($datos_area);

        return redirect('areas')->with('mensaje', 'Usuario creado');
    }

   
    public function show(Admin $admin)
    {
        
    }

    public function edit($id)
    {
        $area = Areas::findOrFail($id);
        return view('admin.areas.edit', compact('area'));
    }

   
    public function update(Request $request, $id)
    {
        $campos_requeridos = [
            'nombre_area'=>'required|string|max:250',
            
        ];
        $alert = [
             'required'=>' :attribute no puede quedar vacío'
        ];

        $this->validate($request, $campos_requeridos, $alert);

        $datos_area = request()->except(['_token', '_method']);
        Areas::where('id','=',$id)->update($datos_area);

        $ticket = Areas::findOrFail($id);
        return redirect('areas')->with('mensaje', 'Elemento Modificado');
    }

   
     
    public function destroy($id)
    {
        Areas::destroy($id);
        return redirect('areas')->with('mensaje', 'Elemento borrado');
    }
}
