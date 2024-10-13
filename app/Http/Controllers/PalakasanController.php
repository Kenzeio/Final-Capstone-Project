<?php

namespace App\Http\Controllers;

use App\Models\Palakasan;
use Illuminate\Http\Request;
use Inertia\Inertia;

    class PalakasanController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $lastPalakasan = Palakasan::orderBy('id', 'desc')->first();
            return Inertia::render('SSCAdmin/Palakasan', [
                'lastPalakasan' => $lastPalakasan
            ]);
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            //
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            $validated = $request->validate([
                'year' => 'required|integer|min:2000|max:' . (date('Y') + 10),
                'theme' => 'required|string|max:255',
                'tagline' => 'required|string|max:255',
                'description' => 'required|string|max:1000',
                'startDate' => 'required|date',
                'endDate' => 'required|date|after_or_equal:startDate',
                'status' => 'boolean',  // Add this line
                    
            ]);
                                
            Palakasan::create($validated);
            return redirect()->route('palakasan.index')->with('success', 'Palakasan successfully added.');
        }

        /**
         * Display the specified resource.
         */
        public function show(string $id)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(string $id)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, string $id)
        {
            $validated = $request->validate([
                'status' => 'required|boolean',
            ]);
    
            $palakasan = Palakasan::findOrFail($id);
            $palakasan->status = $validated['status'];
            $palakasan->save();
    
            return redirect()->route('palakasan.index')->with('success', 'Palakasan status updated successfully.');
        
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
            //
        }
    }
