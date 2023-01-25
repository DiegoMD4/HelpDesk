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
        return view('admin.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): ViewContract
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos_requeridos = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' =>Hash::make('$request->password')
            
            
        ];
        $alert = [
            'required' => ' :attribute es requerido'
        ];

        $this->validate($request, $campos_requeridos, $alert);

        $datos_usuario = request()->except('_token');
        User::insert($datos_usuario);

        return redirect('admin')->with('mensaje', 'Usuario creado');
    }

   
    public function show(User $user)
    {
        //
    }

    
    public function edit(User $id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $campos_requeridos = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            
        ];
        $alert = [
            'required' => ' :attribute es requerido'
        ];

        $this->validate($request, $campos_requeridos, $alert);

        $datos_usuario = request()->except(['_token', '_method']);
        User::where('id','=',$id)->update($datos_usuario);

        $users = User::findOrFail($id);
        return redirect('admin')->with('mensaje', 'Elemento Modificado');
    }

    
    public function destroy(User $id)
    {
        User::destroy($id);
        return redirect('admin')->with('mensaje', 'Elemento borrado');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'area' => ['required', 'string', 'max:255'],

        ]);
    }
}
