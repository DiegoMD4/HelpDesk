<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\View\View as ViewContract; 
use Illuminate\Http\Request;
use App\Models\Estados;

class EstadosController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): ViewContract
    {
        $datos['estados'] = Estados::paginate(10);
        return view('admin.estados.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): ViewContract
    {
        return view('admin.estados.create');
    }

    
    public function store(Request $request)
    {
        $campos_requeridos = [
            'tipo_estado' => ['required', 'string', 'max:255'],
        ];
        $alert = [
            'required' => ' :attribute es requerido'
        ];

        $this->validate($request, $campos_requeridos, $alert);

        $datos_estado = request()->except('_token');
        Estados::insert($datos_estado);

        return redirect('estados')->with('mensaje', 'Elemento creado');
    }

   
    public function show(Estados $estado)
    {
        
    }

    public function edit($id)
    {
        $estado = Estados::findOrFail($id);
        return view('admin.estados.edit', compact('estado'));
    }

   
    public function update(Request $request, $id)
    {
        $campos_requeridos = [
            'tipo_estado'=>'required|string|max:250',
            
        ];
        $alert = [
             'required'=>' :attribute no puede quedar vacío'
        ];

        $this->validate($request, $campos_requeridos, $alert);

        $datos_estado = request()->except(['_token', '_method']);
        Estados::where('id','=',$id)->update($datos_estado);

        $areas = Estados::findOrFail($id);
        return redirect('estados')->with('mensaje', 'Elemento Modificado');
    }

   
     
    public function destroy($id)
    {
        Estados::destroy($id);
        return redirect('estados')->with('mensaje', 'Elemento borrado');
    }
}
