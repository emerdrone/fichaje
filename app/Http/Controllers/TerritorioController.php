<?php

namespace App\Http\Controllers;

use App\Models\Territorio;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TerritorioImport;

class TerritorioController extends Controller
{

    public function index()
    {
        $territorios = Territorio::all();

        return view('territorio.index', compact('territorios'));
    }

    public function create()
    {
        $territorio = new Territorio();
        return view('territorio.create', compact('territorio'));
    }

    public function store(Request $request)
    {
        request()->validate(Territorio::$rules);

        $territorio = Territorio::create($request->all());


        return redirect()->route('territorio.index')
        ->with('message', 'Pais creado correctamente!!');
    }

    public function show($id)
    {
        $territorio = Territorio::find($id);

        return view('territorio.show', compact('territorio'));
    }

    public function edit($id)
    {
        $territorio = Territorio::find($id);

        return view('territorio.edit', compact('territorio'));
    }

    public function update(Request $request, Territorio $territorio)
    {
        request()->validate(Territorio::$rules);

        $territorio->update($request->all());

        return redirect()->route('territorio.index')
            ->with('message', 'Pais actualizado correctamente!!');
    }

    public function destroy($id)
    {
        $territorio = Territorio::find($id)->delete();

        return redirect()->route('territorio.index')
            ->with('error', 'Pais borrado correctamente!!');
    }

    public function restaurar()
    {
        $territorios = Territorio::onlyTrashed()->get();
        return view('territorio.restaurar', compact('territorios'));
    }

    public function restore($id)
    {
        $territorios = Territorio::onlyTrashed()->find($id);
        $territorios->restore();
        return redirect()->route('territorio.index')
        ->with('info', 'El Pais restaurado correctamente!!');
    }

    public function forceDelete($id)
    {
        $territorios = Territorio::onlyTrashed()->find($id);
        $territorios->forceDelete();
        return redirect()->route('territorio.index')
        ->with('error', 'El Pais eliminado completamente del sistema correctamente!!');
    }

    public function import(Request $request)
    {
        if ($request->file('file') != '') {
            Excel::import(new TerritorioImport, $request->file('file'));
            return redirect()->route('territorio.index')->with('message', 'Subida de paises correctamente!');
        } else {
            return redirect()->route('territorio.index');
        }
    }
}
