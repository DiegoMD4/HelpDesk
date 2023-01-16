<?php

namespace App\Http\Controllers;
use App\Models\Tickets;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $datos['tickets'] = Tickets::paginate(10);
        return view('admin.index', $datos);
    }
}
