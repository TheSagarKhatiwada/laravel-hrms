<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $holidays = Holiday::all();
        return view('holidays.index', compact('holidays'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('holidays.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'date' => 'required|date',
            'nepali_date' => 'nullable',
            'type' => 'nullable',
            'description' => 'nullable',
        ]);
        
        $holiday = Holiday::create($validated);
        
        // Auto-convert AD to BS if only AD date is provided
        if (!$validated['nepali_date'] && $validated['date']) {
            $holiday->convertAndSetNepaliDate('date', 'nepali_date');
            $holiday->save();
        }
        
        // Auto-convert BS to AD if only BS date is provided
        if ($validated['nepali_date'] && !$validated['date']) {
            $holiday->convertAndSetAdDate('nepali_date', 'date');
            $holiday->save();
        }
        
        return redirect()->route('holidays.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Holiday $holiday)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $holiday = Holiday::findOrFail($id);
        return view('holidays.edit', compact('holiday'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $holiday = Holiday::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required',
            'date' => 'required|date',
            'nepali_date' => 'nullable',
            'type' => 'nullable',
            'description' => 'nullable',
        ]);
        
        $holiday->update($validated);
        
        // Auto-convert AD to BS if only AD date is provided
        if (!$validated['nepali_date'] && $validated['date']) {
            $holiday->convertAndSetNepaliDate('date', 'nepali_date');
            $holiday->save();
        }
        
        // Auto-convert BS to AD if only BS date is provided
        if ($validated['nepali_date'] && !$validated['date']) {
            $holiday->convertAndSetAdDate('nepali_date', 'date');
            $holiday->save();
        }
        
        return redirect()->route('holidays.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $holiday = Holiday::findOrFail($id);
        $holiday->delete();
        return redirect()->route('holidays.index');
    }
}
