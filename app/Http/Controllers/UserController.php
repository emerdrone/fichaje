<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UserImport;
use App\Models\Empresa;
use App\Models\Municipio;
use App\Models\Localidad;
use App\Models\Provin;
use App\Models\Territorio;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    public function create()
    {
        $user = new User();

        $provincias = Provin::pluck('nombre', 'id');
        $localidades = Localidad::pluck('nombre', 'id');
        $empresas = Empresa::pluck('nombre', 'id');

        return view('user.create', compact('user', 'provincias', 'localidades', 'empresas'));
    }

    public function store(Request $request)
    {
        request()->validate(User::$rules);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->direccion = $request->direccion;
        $user->cp = $request->cp;
        $user->provin_id = $request->provin_id;
        $user->localidad_id = $request->localidad_id;
        $user->telefono = $request->telefono;
        $user->password = bcrypt($request->password);
        $user->empresa_id = $request->empresa_id;
        $user->comentario = $request->comentario;
        $user->save();

        return redirect()->route('user.index')
            ->with('message', 'Usuario creado correctamente!!');
    }

    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);

        $provincias = Provin::pluck('nombre','id');
        $localidades = Localidad::pluck('nombre', 'id');
        $empresas = Empresa::pluck('nombre', 'id');

        return view('user.edit', compact('user', 'provincias', 'localidades', 'empresas'));
    }

    public function update(Request $request, User $user)
    {
        request()->validate(User::$rules);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->direccion = $request->input('direccion');
        $user->cp = $request->input('cp');
        $user->provin_id = $request->input('provin_id');
        $user->localidad_id = $request->input('localidad_id');
        $user->telefono = $request->input('telefono');
        $user->password = $request->input('password');
        $user->empresa_id = $request->input('empresa_id');
        $user->comentario = $request->input('comentario');

        if($user->password == $request->input('password')){
            $user->password = $request->input('password');
        }else{
            $user->password = bcrypt($request->input('password'));
        }

        $user->update();

        return redirect()->route('user.index')
            ->with('message', 'Usuario actualizado correctamente!!');
    }

    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('user.index')
            ->with('error', 'Usuario borrado correctamente!!');
    }

    public function restaurar()
    {
        $users = User::onlyTrashed()->get();
        return view('user.restaurar', compact('users'));
    }

    public function restore($id)
    {
        $users = User::onlyTrashed()->find($id);
        $users->restore();
        return redirect()->route('user.index')
            ->with('message', 'Usuario restaurado correctamente!!');
    }

    public function forceDelete($id)
    {
        $users = User::onlyTrashed()->find($id);
        $users->forceDelete();
        return redirect()->route('user.index')
            ->with('error', 'Usuario eliminado completamente del sistema correctamente!!');
    }

    public function import(Request $request)
    {
        if ($request->file('file') != '') {
            Excel::import(new UserImport, $request->file('file'));
            return redirect()->route('user.index')->with('message', 'Usuario Subida correctamente!');
        } else {
            return redirect()->route('user.index');
        }
    }
}

