<?php

namespace App\Http\Controllers;


use App\Models\Tickets;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View as ViewContract;

use Illuminate\Support\Facades\Hash;

class EntradaController extends Controller
{
    
    public function index(): ViewContract
    {

    }

    
    public function create(): ViewContract
    {
 
    }

   


    public function store(Request $request)
    {
       
    }

   
   /*  public function show($id)
    {
        
    }
 */
    
    public function edit($id)
    {
        $ticket = Tickets::findOrFail($id);
        return view('admin.edit', compact('ticket'));
    }

    public function update($id)
    {
       

        $datos_ticket = request()->except(['_token', '_method']);
        Tickets::where('id','=',$id)->update($datos_ticket);

        $ticket = Tickets::findOrFail($id);
        return redirect('admin.entrada')->with('mensaje', 'Ticket Modificado');
    }

    
    public function destroy($id)
    {
        Tickets::destroy($id);
        return redirect('admin.entrada')->with('mensaje', 'Elemento borrado');
    }

    public function entrada() : ViewContract{
        $tickets = Tickets::paginate();
        return view('admin.entrada', compact('tickets'));
    }
    
}
