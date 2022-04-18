<?php

namespace App\Http\Controllers\administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return view('administracion.role_permiso.role');
    }
    public function create()
    {
        return view('administracion.role_permiso.create');
    }
    public function edit($id)
    {
        return view('administracion.role_permiso.edit', compact('id'));
    }
}
