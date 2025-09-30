<?php

namespace App\Http\Controllers;

use App\Models\TipoVehiculo;
use Illuminate\Http\Request;

class TipoVehiculoController extends Controller
{
    public function index()
    {
        $tipos = TipoVehiculo::all();
        return view('tipovehiculos.index', compact('tipos'));
    }

    public function create()
    {
        return view('tipovehiculos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:tipo_vehiculos,nombre|max:100',
            'descripcion' => 'nullable|max:255',
        ]);

        TipoVehiculo::create($request->all());

        return redirect()->route('tipovehiculos.index')
                         ->with('success', 'Tipo de Vehículo creado correctamente.');
    }

    public function show(TipoVehiculo $tipovehiculo)
    {
        return view('tipovehiculos.show', compact('tipovehiculo'));
    }

    public function edit(TipoVehiculo $tipovehiculo)
    {
        return view('tipovehiculos.edit', compact('tipovehiculo'));
    }

    public function update(Request $request, TipoVehiculo $tipovehiculo)
    {
        $request->validate([
            'nombre' => 'required|max:100|unique:tipo_vehiculos,nombre,' . $tipovehiculo->id,
            'descripcion' => 'nullable|max:255',
        ]);

        $tipovehiculo->update($request->all());

        return redirect()->route('tipovehiculos.index')
                         ->with('success', 'Tipo de Vehículo actualizado correctamente.');
    }

    public function destroy(TipoVehiculo $tipovehiculo)
    {
        $tipovehiculo->delete();

        return redirect()->route('tipovehiculos.index')
                         ->with('success', 'Tipo de Vehículo eliminado correctamente.');
    }
}
