<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Todos = Todo::all();
        return view('todo.index', compact('Todos'));
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
        $Todo  = new Todo();

        $Todo->task = $request->task;

        $Todo->save();
        return back();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Todo::find($id)->delete();
        return back();
    }

    public function done(string $id){
        $Todo = Todo::find($id);

        $Todo->done = 1;

        $Todo->save();
        return back();
    }

    public function undo(string $id){
        $Todo = Todo::find($id);

        $Todo->done = 0;

        $Todo->save();
        return back();
    }
}
