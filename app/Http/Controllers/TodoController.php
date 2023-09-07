<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

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
        $PendingTasks = $this->PendingTasks;
        $CompletedTasks = $this->CompletedTasks;
        return view('todo.index', compact('PendingTasks', 'CompletedTasks'));
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
        return redirect('/todo');
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

        $PendingTasks = $this->PendingTasks;
        $CompletedTasks = $this->CompletedTasks;

        return view('todo.index', compact('Item', 'PendingTasks', 'CompletedTasks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Todo = Todo::find($id);

        if($Todo){
            $Todo->task = $request->task;
            $Todo->save();
            return redirect('/todo');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Todo::find($id)->delete();
        return redirect('/todo');
    }

    public function done(string $id){
        $Todo = Todo::find($id);

        $Todo->done = 1;

        $Todo->save();
        return redirect('/todo');
    }

    public function undo(string $id){
        $Todo = Todo::find($id);

        $Todo->done = 0;

        $Todo->save();
        return redirect('/todo');
    }
}
