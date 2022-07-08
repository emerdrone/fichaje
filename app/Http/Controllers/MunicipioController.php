<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MunicipioImport;


class MunicipioController extends Controller
{

    public function index()
    {
        $municipios = Municipio::all();

        return view('municipio.index', compact('municipios'));
    }

    public function create()
    {
        $municipio = new Municipio();
        return view('municipio.create', compact('municipio'));
    }

    public function store(Request $request)
    {
        request()->validate(Municipio::$rules);

        $municipio = Municipio::create($request->all());


        return redirect()->route('municipio.index')
            ->with('message', 'Municipio creado correctamente!!');
    }

    public function show($id)
    {
        $municipio = Municipio::find($id);

        return view('municipio.show', compact('municipio'));
    }

    public function edit($id)
    {

        $municipio = Municipio::find($id);

        return view('municipio.edit', compact('municipio'));
    }

    public function update(Request $request, Municipio $municipio)
    {
        request()->validate(Municipio::$rules);

        $municipio->update($request->all());

        return redirect()->route('municipio.index')
            ->with('message', 'Municipio actualizado correctamente!!');
    }

    public function destroy($id)
    {
        $municipio = Municipio::find($id)->delete();

        return redirect()->route('municipio.index')
            ->with('error', 'Municipio borrado correctamente!!');
    }

    public function restaurar()
    {
        $municipios = Municipio::onlyTrashed()->get();
        return view('municipio.restaurar', compact('municipios'));
    }

    public function restore($id)
    {
        $municipios = Municipio::onlyTrashed()->find($id);
        $municipios->restore();
        return redirect()->route('municipio.index')
            ->with('info', 'El Municipio restaurado correctamente!!');
    }

    public function forceDelete($id)
    {
        $municipios = Municipio::onlyTrashed()->find($id);
        $municipios->forceDelete();
        return redirect()->route('municipio.index')
            ->with('error', 'El Municipio eliminado completamente del sistema correctamente!!');
    }

    public function import(Request $request)
    {
        if ($request->file('file') != '') {
            Excel::import(new MunicipioImport, $request->file('file'));
            return redirect()->route('municipio.index')->with('message', 'Subida de municipios correctamente!');
        } else {
            return redirect()->route('municipio.index');
        }
    }
}
