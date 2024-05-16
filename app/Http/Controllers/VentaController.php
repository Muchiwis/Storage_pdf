<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


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

        if (!file_exists(storage_path('app/pdf_save_real'))) {
            mkdir(storage_path('app/pdf_save_real'), 0755, true); // Create directory recursively with write permissions
        }
        $namePdf = $request->producto;
         $pdf_path = Pdf::loadView('ventas.pdf.body', compact('ventas'));
         $pdf_path->save(storage_path('app/pdf_save_real/'.$namePdf.'.pdf'));
        return redirect()->route('ventas.show', ['venta' => 1]); 
    }

    public function descarga(Request $request){
        //dd($request->route("pdf"));
        $filename = $request->route("pdf");
        $filepath = storage_path('app/pdf_save_real/' . $filename);

        if (file_exists($filepath)) {
            $headers = [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ];
    
            return response()->file($filepath, $headers);
        } else {
            abort(404, 'File not found');
        }
    }

   /* public function store(Request $request)
    {
        $ventas = Venta::create($request->all());
    
        try {
            $namePdf = $request->producto;
    
            // Ensure directory exists and has write permissions
            if (!file_exists(storage_path('app/pdf_save'))) {
                mkdir(storage_path('app/pdf_save'), 0755, true); // Create directory recursively with write permissions
            }
    
            $pdf_path = Pdf::loadView('ventas.pdf.body', compact('ventas'));
            $pdf_path->save(storage_path('app/pdf_save/' . $namePdf . '.pdf'));
    
            return redirect()->route('ventas.show', ['venta' => 1]);
        } catch (\Throwable $e) {
            report($e);
            return redirect()->back()->withErrors(['error' => 'Error generating PDF: ' + $e->getMessage()]);
        }
    }*/
    
    // In your view, use the following code to generate the download link:
    

    


   /* public function store(Request $request)
    {
        $ventas = Venta::create($request->all());

        try {
            $namePdf = $request->producto;

            // Asegúrate de que el directorio exista y tenga permisos de escritura
            if (!file_exists(public_path('pdf_save'))) {
                mkdir(public_path('pdf_save'), 0755, true); // Crea el directorio de forma recursiva con permisos de escritura
            }

            $pdf_path = Pdf::loadView('ventas.pdf.body', compact('ventas'));
            $pdf_path->save(public_path('pdf_save/' . $namePdf . '.pdf'));

            return redirect()->route('ventas.show', ['venta' => 1]);
        } catch (\Throwable $e) {
            report($e);
            return redirect()->back()->withErrors(['error' => 'Error generando PDF: ' + $e->getMessage()]);
        }
    }*/


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

    /*public function donwload($pdf)
    {
        return Pdf::download();
    }*/

    // public function downloadPdf(Request $request, $ventaId)
    // {
    //     $venta = Venta::findOrFail($ventaId);
    
    //     // Option 1: Using asset() (Assuming Public Disk Storage)
    //     // Ensure your PDF resides in the public directory for direct access.
    //     // $filePath = asset('app/pdf_save/' . $venta->producto . '.pdf');
    
    //     // Option 2: Using Storage::path() and response()->download()
    
    //     // Get absolute file path (assuming local storage)
    //     $filePath = Storage::disk('local')->path('app/pdf_save/' . $venta->producto . '.pdf');
    
    //     if (File::exists($filePath)) {
    //         // Generate download response with absolute path and filename
    //         return response()->download($filePath, $venta->producto . '.pdf');
    //     } else {
    //         abort(404); // Handle file not found error
    //     }
    // }
    

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
