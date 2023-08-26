<?php

namespace App\Http\Controllers\Api;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Tasks = [
            'pending' => Todo::where('done',false)->orderBy('created_at','DESC')->get(),
            'completed' => Todo::where('done',true)->latest()->get()
        ];
        return response($Tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $Todo  = new Todo();
            $Todo->task = $request->task;
            $Todo->save();
            return $Todo;
        }
        catch(\Throwable $th){
            return response('500 '.$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            return Todo::find($id);
        } catch (\Throwable $th) {
            return response('500 '.$th->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            return Todo::find($id);
        } catch (\Throwable $th) {
            return response('500 '.$th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $Todo = Todo::find($id);
            $Todo->task = $request->task;
            $Todo->save();
            return $Todo;
        } catch (\Throwable $th) {
            return response('500 '.$th->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
           return Todo::destroy($id);
        }
        catch(\Throwable $th){
            return response('500 '.$th->getMessage());
        }

    }

    public function done(string $id){
        try {
            $Todo = Todo::find($id);
            $Todo->done = 1;
            $Todo->save();
            return $Todo;
        } catch (\Throwable $th) {
            return response('500 '.$th->getMessage());
        }
    }

    public function undo(string $id){
        try {
            $Todo = Todo::find($id);
            $Todo->done = 0;
            $Todo->save();
            return $Todo;
        } catch (\Throwable $th) {
            return response('500 '.$th->getMessage());
        }
    }
}
