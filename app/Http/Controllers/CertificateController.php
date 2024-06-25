<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50', // Limiting name length
            'date_issued' => 'required|date',
        ]);

        $certificate = Certificate::create([
            'name' => $request->name,
            'date_issued' => $request->date_issued,
        ]);

        return response()->json($certificate, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($unique_number)
    {
        $certificate = Certificate::where('unique_number', $unique_number)->firstOrFail();

        $pdf = PDF::loadView('certificate', compact('certificate'))->setPaper('a4', 'landscape');;
        $filename = $certificate->name . '-' . $certificate->unique_number . '.pdf';

        return $pdf->stream($filename);
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
