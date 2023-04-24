<?php

namespace App\Http\Controllers;


use App\Models\Estados;
use App\Models\Tickets;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View as ViewContract;

use Illuminate\Support\Facades\Hash;

class TecnicoController extends Controller
{
    
    public function index(): ViewContract
    {
       
        

        $tickets = Tickets::where('id_estado', 1)
        ->paginate(8); 
        $estados = Estados::Pluck('tipo_estado', 'id');
        return view('tecnico.index', compact('tickets', 'estados'))->with('i', (request()->input('page', 1) - 1) * $tickets->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): ViewContract
    {
        return view('tecnico.create');
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
        ]);
        $request->request->add([
           
            'password'=>Hash::make($request->input('password')),
            

        ]);
        User::create($request->all());

        return redirect('tecnico')->with('mensaje', 'Usuario creado');
    }

   
    public function show($id)
    {
        $ticket = Tickets::find($id);

        return view('tecnico.show', compact('ticket'));
    }

    
    public function edit($id)
    {
        $ticket = Tickets::findOrFail($id);
        return view('tecnico.edit', compact('ticket'));
    }

    public function update($id)
    {
       

        $datos_ticket = request()->except(['_token', '_method']);
        Tickets::where('id','=',$id)->update($datos_ticket);

        $ticket = Tickets::findOrFail($id);
        return redirect('tecnico')->with('mensaje', 'Ticket Modificado');
    }

    
    public function destroy($id)
    {
        Tickets::destroy($id);
        return redirect('tecnico')->with('mensaje', 'Elemento borrado');
    }

    public function aceptado() : ViewContract{
        $tickets = Tickets::paginate();
        return view('tecnico.aceptado', compact('tickets'));
    }

    
}
