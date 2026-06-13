<?php

namespace App\Http\Controllers;

use App\Models\Pensioner;
use Illuminate\Http\Request;

class PensionerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $pensioner = Pensioner::all();
            //select * from pensioner
            $response = [
                'success' => true,
                'data' => $pensioner,
                'message' => 'Pensioner fetched successfully.'
            ];
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while fetching pensioner.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $validatedData = $request->validate([
                'serial_number' => 'required|string|max:10|unique:pensioners',
                'control_number' => 'required|string|max:20|unique:pensioners',
                'first_name' => 'required|string|max:255',
                'middle_name' => 'nullable|string|max:255',
                'last_name' => 'required|string|max:255',
                'pension_account' => 'required|string|max:20',
                'rank' => 'nullable|string|max:20',
                'bank_name' => 'required|string|max:50',
                'amount_centavos' => 'required|numeric',
                'retirement_date' => 'required|date',
            ]);

            $pensioner = Pensioner::create($validatedData);

            return response()->json($pensioner, 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while saving pensioner.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         try {
            $pensioner = Pensioner::findOrFail($id);
            return response()->json($pensioner, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while fetching pensioner.',
                'pensioner_id' => $id,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          try {
            $pensioner = Pensioner::findOrFail($id);

            $validatedData = $request->validate([
                'serial_number' => 'required|string|max:10',
                'control_number' => 'required|string|max:20',
                'first_name' => 'required|string|max:255',
                'middle_name' => 'nullable|string|max:255',
                'last_name' => 'required|string|max:255',
                'pension_account' => 'required|string|max:20',
                'rank' => 'nullable|string|max:20',
                'bank_name' => 'required|string|max:50',
                'amount_centavos' => 'required|numeric',
                'retirement_date' => 'required|date',
            ]);

            $pensioner->update($validatedData);

            return response()->json($pensioner, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while updating pensioner.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $pensioner = Pensioner::findOrFail($id);
            $pensioner->delete();

            return response()->json([
                'message' => 'Pensioner deleted successfully.',
                'pensioner_id' => $id
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while deleting pensioner.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}