<?php

namespace App\Http\Controllers;


use App\Models\Tickets;
use App\Models\User;
use App\Mail\EnviarEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View as ViewContract;


class EntradaController extends Controller
{
    
    /* public function index(): ViewContract
    {

    }

    
    public function create(): ViewContract
    {
 
    }

   


    public function store(Request $request)
    {
       
    }
 */
   
   /*  public function show($id)
    {
        
    }
 */
    
    public function edit($id)
    {
        $ticket = Tickets::findOrFail($id);
        $users = User::select('name')->where('id_rol', '2')->get();
        return view('admin.edit', compact('ticket', 'users'));
    }

    public function update(Request $request, $id)
    {
       
        $campos_requeridos = [
            /* 'descripcion'=>'required|string|max:800', */
            'tecnico_asignado'=>'required|string|max:255',
           
        ];
        $alert = [
             'required'=>' Debe seleccionar tecnico'
        ];

        $this->validate($request, $campos_requeridos, $alert);

        $datos_ticket = request()->except(['_token', '_method']);
        Tickets::where('id','=',$id)->update($datos_ticket);

        $ticket = Tickets::findOrFail($id);
        return redirect('entrada')->with('mensaje', 'Ticket Modificado');
    }

    
    public function destroy($id)
    {
        Tickets::destroy($id);
        return redirect('asignado')->with('mensaje', 'Elemento borrado');
    }

    public function entrada() : ViewContract{
        
        $tickets = Tickets::where('id_estado', 1)->where('tecnico_asignado', 'Pendiente')->paginate(5);
        return view('admin.entrada', compact('tickets'));
    }

    public function asignado() : ViewContract{
        $tickets = Tickets::where('id_estado', 3)->where('tecnico_asignado', '!=', 'Pendiente')
        ->paginate(5);
        $users = User::where('id_rol', '2')->pluck('name', 'id');
        return view('admin.asignado', compact('tickets', 'users'));
    }
    
}
