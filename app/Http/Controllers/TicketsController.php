<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use Illuminate\Contracts\View\View as ViewContract; 
use Illuminate\Http\Request;


class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : ViewContract
    {
        $datos['tickets'] = Tickets::paginate(10);
        return view('ticket.ticket_index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() : ViewContract
    {
        return view('ticket.create');
        
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
            'nombre_usuario'=>'required|string|max:250',
            'descripcion'=>'required|string|max:800',
          
        ];
        $alert = [
             'required'=>' :attribute es requerido'
        ];

        $this->validate($request, $campos_requeridos, $alert);

        $datos_ticket = request()->except('_token');
        Tickets::insert($datos_ticket);
       
        return redirect('ticket')->with('mensaje', 'Ticket creado y enviado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */

   /*  public function show(Tickets $tickets) 
    {
        
    } */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function edit($id) : ViewContract
    {
        $ticket = Tickets::findOrFail($id);
        return view('ticket.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) 
    
    {
        $campos_requeridos = [
            'nombre_usuario'=>'required|string|max:250',
            'descripcion'=>'required|string|max:800',
           
        ];
        $alert = [
             'required'=>' :attribute no puede quedar vacío'
        ];

        $this->validate($request, $campos_requeridos, $alert);

        $datos_ticket = request()->except(['_token', '_method']);
        Tickets::where('id','=',$id)->update($datos_ticket);

        $ticket = Tickets::findOrFail($id);
        return redirect('ticket')->with('mensaje', 'Ticket Modificado');
         

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tickets::destroy($id);
        return redirect('ticket')->with('mensaje', 'Ticket borrado');
        
    }
}
