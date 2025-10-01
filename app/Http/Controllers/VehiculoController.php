<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\TipoVehiculo;
use App\Models\Repartidor;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function index()
    {
        $vehiculos = Vehiculo::with(['tipoVehiculo', 'repartidor'])->paginate(10);
        return view('vehiculos.index', compact('vehiculos'));
    }

    public function create()
    {
        $tipos = TipoVehiculo::all();
        $repartidores = Repartidor::all();
    return view('vehiculos.crear', compact('tipos', 'repartidores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'color' => 'required|string|max:50',
            'marca' => 'required|string|max:100',
            'modelo' => 'required|string|max:100',
            'placa' => 'required|string|max:50|unique:vehiculos,placa',
            'tipo_vehiculo_id' => 'required|exists:tipo_vehiculos,id',
            'repartidor_id' => 'required|exists:repartidors,id',
        ]);

        Vehiculo::create($request->all());

        return redirect()->route('vehiculos.index')
            ->with('success', 'Vehículo creado correctamente.');
    }

    public function show(Vehiculo $vehiculo)
    {
    return view('vehiculos.mostrar', compact('vehiculo'));
    }

    public function edit(Vehiculo $vehiculo)
    {
        $tipos = TipoVehiculo::all();
        $repartidores = Repartidor::all();
    return view('vehiculos.editar', compact('vehiculo', 'tipos', 'repartidores'));
    }

    public function update(Request $request, Vehiculo $vehiculo)
    {
        $request->validate([
            'color' => 'required|string|max:50',
            'marca' => 'required|string|max:100',
            'modelo' => 'required|string|max:100',
            'placa' => 'required|string|max:50|unique:vehiculos,placa,' . $vehiculo->id,
            'tipo_vehiculo_id' => 'required|exists:tipo_vehiculos,id',
            'repartidor_id' => 'required|exists:repartidors,id',
        ]);

        $vehiculo->update($request->all());

        return redirect()->route('vehiculos.index')
            ->with('success', 'Vehículo actualizado correctamente.');
    }

    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();

        return redirect()->route('vehiculos.index')
            ->with('success', 'Vehículo eliminado correctamente.');
    }
}
