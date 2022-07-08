<?php

namespace App\Http\Controllers;

use App\Models\Localidad;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\LocalidadImport;
use App\Models\Provin;
use Illuminate\Support\Facades\DB;

class LocalidadController extends Controller
{

    public function index()
    {
        $localidads = Localidad::all();

        return view('localidad.index', compact('localidads'));
    }

    public function create()
    {
        $localidad = new Localidad();
        $list = Provin::pluck('nombre', 'id');
        return view('localidad.create', compact('localidad', 'list'));
    }

    public function store(Request $request)
    {
        request()->validate(Localidad::$rules);

        $localidad = Localidad::create($request->all());


        return redirect()->route('localidad.index')
            ->with('message', 'Localidad creada correctamente!!');
    }

    public function show($id)
    {
        $localidad = Localidad::find($id);

        return view('localidad.show', compact('localidad'));
    }

    public function edit($id)
    {
        $localidad = Localidad::find($id);

        $provincias = Provin::pluck('nombre', 'id');
        return view('localidad.edit', compact('localidad', 'provincias'));
    }

    public function update(Request $request, Localidad $localidad)
    {
        request()->validate(Localidad::$rules);

        $localidad->update($request->all());

        return redirect()->route('localidad.index')
            ->with('message', 'Localidad actualizada correctamente!!');
    }

    public function destroy($id)
    {
        $localidad = Localidad::find($id)->delete();

        return redirect()->route('localidad.index')
            ->with('error', 'Localidad borrada correctamente!!');
    }

    public function restaurar()
    {
        $localidads = Localidad::onlyTrashed()->get();
        return view('localidad.restaurar', compact('localidads'));
    }

    public function restore($id)
    {
        $localidads = Localidad::onlyTrashed()->find($id);
        $localidads->restore();
        return redirect()->route('localidad.index')
            ->with('message', 'Localidad restaurada correctamente!!');
    }

    public function forceDelete($id)
    {
        $localidads = Localidad::onlyTrashed()->find($id);
        $localidads->forceDelete();
        return redirect()->route('localidad.index')
            ->with('error', 'Localidad eliminada completamente del sistema correctamente!!');
    }

    public function import(Request $request)
    {
        if ($request->file('file') != '') {
            Excel::import(new LocalidadImport, $request->file('file'));
            return redirect()->route('localidad.index')->with('message', 'Localidad Subida correctamente!');
        } else {
            return redirect()->route('localidad.index');
        }
    }

    public function locali()
    {
        // $users = Localidad::select('id', 'nombre', 'provin_id')->get();
        $users = DB::table('localidads')
            ->join('provins', 'provins.id', '=', 'localidads.provin_id')
            ->select('localidads.id', 'localidads.nombre', 'provins.nombre as provin_id')
            ->get();

        // return datatables()->collection($localidades)->toJson();

        return datatables()
            ->collection($users)
            ->addColumn('btn', function ($row) {
                $btn = '<a href="' . route('localidad.show', $row->id) . '" class="btn btn-primary btn-sm mr-2" title="Mostrar"><i class="fa fa-fw fa-eye"></i></a>';
                $btn = $btn . '<a href="' . route('localidad.edit', $row->id) . '" class="edit btn btn-success btn-sm mr-2" title="Editar"><i class="fa fa-fw fa-edit"></i></a>';
                return $btn;
            })

            ->rawColumns(['btn'])

            ->toJson();
    }
}
