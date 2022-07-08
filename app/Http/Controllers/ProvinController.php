<?php

namespace App\Http\Controllers;

use App\Models\Provin;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProvinImport;
use App\Models\Municipio;
use App\Models\Localidad;
use App\Models\Territorio;

class ProvinController extends Controller
{

    public function index()
    {
        $provins = Provin::all();

        return view('provin.index', compact('provins'));
    }

    public function create()
    {
        $provin = new Provin();

        $list = Territorio::pluck('nombre', 'id');

        return view('provin.create', compact('provin', 'list'));
    }

    public function store(Request $request)
    {
        request()->validate(Provin::$rules);

        $provin = Provin::create($request->all());


        return redirect()->route('provin.index')
            ->with('message', 'Provincia creado correctamente!!');
    }

    public function show($id)
    {
        $provin = Provin::find($id);

        return view('provin.show', compact('provin'));
    }

    public function edit($id)
    {
        $provin = Provin::find($id);

        $list = Territorio::pluck('nombre','id');

        return view('provin.edit', compact('provin', 'list'));
    }

    public function update(Request $request, Provin $provin)
    {
        request()->validate(Provin::$rules);

        $provin->update($request->all());

        return redirect()->route('provin.index')
            ->with('message', 'Provincia actualizada correctamente!!');
    }

    public function destroy($id)
    {
        $provin = Provin::find($id)->delete();

        return redirect()->route('provin.index')
            ->with('error', 'Provincia borrada correctamente!!');
    }

    public function restaurar()
    {
        $provins = Provin::onlyTrashed()->get();
        return view('provin.restaurar', compact('provins'));
    }

    public function restore($id)
    {
        $provins = Provin::onlyTrashed()->find($id);
        $provins->restore();
        return redirect()->route('provin.index')
            ->with('message', 'Provincia restaurada correctamente!!');
    }

    public function forceDelete($id)
    {
        $provins = Provin::onlyTrashed()->find($id);
        $provins->forceDelete();
        return redirect()->route('provin.index')
            ->with('error', 'Provincia eliminada completamente del sistema correctamente!!');
    }

    public function import(Request $request)
    {
        if ($request->file('file') != '') {
            Excel::import(new ProvinImport, $request->file('file'));
            return redirect()->route('provin.index')->with('message', 'Provincia Subida correctamente!');
        } else {
            return redirect()->route('provin.index');
        }
    }

    // public function provi()
    // {
    //     $users = Provin::select('id', 'nombre')->get();

    //     return datatables()
    //         ->of($users)
    //         ->addColumn('btn', function ($row) {
    //             $btn = '<a href="' . route('provin.show', $row->id) . '" class="btn btn-success btn-sm mr-2" title="Mostrar"><i class="far fa-eye"></i></a>';
    //             $btn = $btn . '<a href="' . route('provin.edit', $row->id) . '" class="edit btn btn-danger btn-sm mr-2" title="Editar"><i class="fa fa-pen"></i></a>';
    //             return $btn;
    //         })

    //         ->rawColumns(['btn'])

    //         ->toJson();
    // }

    // public function getTowns(Request $request, $id)
    // {
    //     if ($request->ajax()) {
    //         $towns = Localidad::towns($id);
    //         return response()->json($towns);
    //     }
    // }
}

