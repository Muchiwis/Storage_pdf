<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ventas.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ventas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ventas = Venta::create($request->all());
         //crear pdf
         //return Pdf::loadView('ventas.pdf.body')->download();
        //  $namePdf = now()."- venta".$request->codigo;
        //  dd($namePdf);
        $namePdf = $request->producto;
         $pdf_path = Pdf::loadView('ventas.pdf.body', compact('ventas'));
         $pdf_path->save(storage_path('app/public/pdf_save/'.$namePdf.'.pdf'));
            //return redirect()->route('ventas.show', ['venta' => 1]); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ventas = Venta::all();
        return view('ventas.show', compact('ventas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function donwload($pdf)
    {
        return Pdf::download();
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
