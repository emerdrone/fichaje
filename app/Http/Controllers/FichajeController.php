<?php

namespace App\Http\Controllers;

use App\Models\Fichaje;
use Illuminate\Http\Request;

/**
 * Class FichajeController
 * @package App\Http\Controllers
 */
class FichajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fichajes = Fichaje::paginate();

        return view('fichaje.index', compact('fichajes'))
            ->with('i', (request()->input('page', 1) - 1) * $fichajes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fichaje = new Fichaje();
        return view('fichaje.create', compact('fichaje'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Fichaje::$rules);

        $fichaje = Fichaje::create($request->all());

        return redirect()->route('fichajes.index')
            ->with('success', 'Fichaje created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fichaje = Fichaje::find($id);

        return view('fichaje.show', compact('fichaje'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fichaje = Fichaje::find($id);

        return view('fichaje.edit', compact('fichaje'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Fichaje $fichaje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fichaje $fichaje)
    {
        request()->validate(Fichaje::$rules);

        $fichaje->update($request->all());

        return redirect()->route('fichajes.index')
            ->with('success', 'Fichaje updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $fichaje = Fichaje::find($id)->delete();

        return redirect()->route('fichajes.index')
            ->with('success', 'Fichaje deleted successfully');
    }
}
