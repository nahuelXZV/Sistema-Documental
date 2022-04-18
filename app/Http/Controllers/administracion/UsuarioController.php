<?php

namespace App\Http\Controllers\administracion;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        return view('administracion.usuarios.usuario');
    }
    public function create()
    {
        return view('administracion.usuarios.create');
    }
    public function edit($id)
    {
        return view('administracion.usuarios.edit', compact('id'));
    }
}
