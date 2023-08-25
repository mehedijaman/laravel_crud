<?php

namespace App\Http\Controllers\Api;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TodoController extends Controller
{
    protected $PendingTasks;
    protected $CompletedTasks;

    public function __construct()
    {
        $this->PendingTasks = Todo::where('done',false)->orderBy('created_at','ASC')->get();
        $this->CompletedTasks = Todo::where('done',true)->latest()->get();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Tasks = [
            'PendingTasks' => $this->PendingTasks,
            'CompletedTasks' => $this->CompletedTasks
        ];

        return response($Tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Todo  = new Todo();

        $Todo->task = $request->task;

        try{
            $Todo->save();
            return response('200');
        }
        catch(\Exception $e){
            return response('500'.$e->getMessage());
        }

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
        $Item = Todo::find($id);

        return response($Item);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Todo = Todo::find($id);
        $Todo->task = $request->task;
        try {
            $Todo->save();
            return response('200');
        } catch (\Throwable $th) {
            return response('500'.$e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            Todo::find($id)->delete();
        }
        catch(\Exception $e){
            return response('500'.$e->getMessage());
        }

    }

    public function done(string $id){
        $Todo = Todo::find($id);

        $Todo->done = 1;

        try {
            $Todo->save();
            return response('200');
        } catch (\Throwable $th) {
            return response('500'.$th->getMessage());
        }
    }

    public function undo(string $id){
        $Todo = Todo::find($id);

        $Todo->done = 0;

        try {
            $Todo->save();
            return response('200');
        } catch (\Throwable $th) {
            return response('500'.$th->getMessage());
        }
    }
}
