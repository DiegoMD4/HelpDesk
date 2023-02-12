<?php

namespace App\Http\Controllers;

use App\Models\Estados;
use App\Models\Tickets;
use Illuminate\Contracts\View\View as ViewContract; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : ViewContract
    {
        /* $tickets = DB::table('tickets', 'users')->where('id_usuario', '=', 'users.id')->paginate(); */ 
        $tickets = Tickets::paginate(); 
        $estados = Estados::Pluck('tipo_estado', 'id');
        return view('ticket.ticket_index', compact('tickets', 'estados'))->with('i', (request()->input('page', 1) - 1) * $tickets->perPage());
    }


    public function pendiente() : ViewContract{
        $tickets = Tickets::paginate();
        return view('ticket.pendiente', compact('tickets'));
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

     public function show($id) : ViewContract
    {
        $ticket = Tickets::find($id);

        return view('ticket.show', compact('ticket'));
    } 

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
