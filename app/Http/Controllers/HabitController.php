<?php

namespace App\Http\Controllers;
use App\Models\Habit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class HabitController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $habits = Habit::with('user')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();




        return view('habits.allHabits', ['habits' => $habits]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Habit::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => auth()->id(), 
    ]);

        return redirect('/allHabits')->with('success', 'Habit created!');
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
    public function complete(Request $request, string $id)
    {   
        $habit = Habit::findOrFail($id);

        if ($habit->last_completed && $habit->last_completed->isToday()) {
            return redirect('/allHabits')->with('error', 'Habit completed today already!');
        }
        else {
            $habit->completions()->create(['completed_at' => now()]);
            $habit->counter += 1;
            $habit->last_completed = now();
            $habit->save();
            return redirect('/allHabits')->with('success', 'Habit updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habit $habit)
    {
        $this->authorize('delete', $habit);

        $habit->delete();

        return redirect('/allHabits')->with('success', 'Habit deleted!');
    }
}
