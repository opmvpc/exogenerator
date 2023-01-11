<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Exercise;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ExercisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Exercises/Index', [
            'chapters' => Chapter::with([
                'exercises',
            ])->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Exercise $exercise)
    {
        $variation = null;
        $studentResults = null;
        if (auth()->user()->is_admin) {
            $variation = $exercise
                ->variations()
                ->with('results', 'parameters')
                ->first()
            ;
            $studentResults = $variation
                ->results()
                ->where('user_id', '!=', auth()->user()->id)
                ->with('resultValues')->get()
            ;
        } else {
            $variation = $exercise->variations()->with('results', function ($query) {
                $query->where('user_id', auth()->user()->id)->with('resultValues');
            })->with('parameters')->first();
        }

        return Inertia::render('Exercises/Show', [
            'exercise' => $exercise,
            'variation' => $variation,
            'studentResults' => $studentResults,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Exercise $exercise)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exercise $exercise)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exercise $exercise)
    {
    }
}
