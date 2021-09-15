<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;

class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita::all()->toArray();
        return array_reverse($citas);
    }

    public function store(Request $request)
    {
        $cita = new Cita([
            'nota' => $request->input('nota'),
            'email' => $request->input('email'),
            'fecha' => $request->input('fecha')
        ]);
        $cita->save();

        return response()->json('cita created successfully!');
    }

    public function show($id)
    {
        $cita = Cita::find($id);
        return response()->json($cita);
    }

    public function update($id, Request $request)
    {
        $cita = Cita::find($id);
        $cita->update($request->all());

        return response()->json('cita data updated successfully!');
    }

    public function destroy($id)
    {
        $cita = Cita::find($id);
        $cita->delete();

        return response()->json('cita deleted successfully!');
    }
}
