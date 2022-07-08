<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EmpresaImport;
use App\Models\Localidad;
use App\Models\Provin;
use App\Models\Territorio;

class EmpresaController extends Controller
{

    public function index()
    {
        $empresas = Empresa::all();

        return view('empresa.index', compact('empresas'));
    }

    public function create()
    {
        $empresa = new Empresa();
        $provincias = Provin::pluck('nombre', 'id');
        $territorios = Territorio::pluck('nombre', 'id');
        $municipios = Localidad::pluck('nombre', 'id');

        return view('empresa.create', compact('empresa', 'provincias','municipios', 'territorios'));
    }

    public function store(Request $request)
    {
        request()->validate(Empresa::$rules);

        $empresa = Empresa::create($request->all());


        return redirect()->route('empresa.index')
            ->with('message', 'Empresa creada correctamente!!');
    }

    public function show($id)
    {
        $empresa = Empresa::find($id);

        return view('empresa.show', compact('empresa'));
    }

    public function edit($id)
    {
        $empresa = Empresa::find($id);

        $locale = Localidad::where('provin_id', $empresa->provin_id)->get();

        $provincias = Provin::pluck('nombre', 'id');
        $territorios = Territorio::pluck('nombre', 'id');
        $municipios = $locale->pluck('nombre', 'id');
        return view('empresa.edit', compact('empresa', 'provincias', 'municipios', 'territorios'));
    }

    public function update(Request $request, Empresa $empresa)
    {
        request()->validate(Empresa::$rules);

        $empresa->update($request->all());

        return redirect()->route('empresa.index')
            ->with('message', 'Empresa actualizada correctamente!!');
    }

    public function destroy($id)
    {
        $empresa = Empresa::find($id)->delete();

        return redirect()->route('empresa.index')
            ->with('error', 'Empresa borrada correctamente!!');
    }

    public function restaurar()
    {
        $empresas = Empresa::onlyTrashed()->get();
        return view('empresa.restaurar', compact('empresas'));
    }

    public function restore($id)
    {
        $empresas = Empresa::onlyTrashed()->find($id);
        $empresas->restore();
        return redirect()->route('empresa.index')
            ->with('info', 'Empresa restaurada correctamente!!');
    }

    public function forceDelete($id)
    {
        $empresas = Empresa::onlyTrashed()->find($id);
        $empresas->forceDelete();
        return redirect()->route('empresa.index')
            ->with('error', 'Empresa eliminada completamente del sistema correctamente!!');
    }

    public function import(Request $request)
    {
        if ($request->file('file') != '') {
            Excel::import(new EmpresaImport, $request->file('file'));
            return redirect()->route('empresa.index')->with('message', 'Empresas Subidas correctamente!');
        } else {
            return redirect()->route('empresa.index');
        }
    }

    public function localidad($id)
    {
        return Localidad::where('provin_id','=',$id)->get();
    }
}
