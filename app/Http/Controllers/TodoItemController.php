<?php

namespace App\Http\Controllers;

use App\TodoItem;
use Illuminate\Http\Request;
use App\Http\Resources\TodoItemResource;
use Illuminate\Support\Facades\Auth;

class TodoItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return new TodoItemResrouce($request->user()->todoItems);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todo = $request->user()->todo()->find($request->todo_id);

        $todo_item = new TodoItem();
        $todo_item->todo_id = $todo->id;
        $todo_item->action = $request->action;
        $todo_item->done = 0;

        $todo_item->save();
        return new TodoItemResource($todo_item);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TodoItem  $todoItem
     * @return \Illuminate\Http\Response
     */
    public function show(TodoItem $todoItem, Request $request)
    {
        return new TodoItemResource($request->user()->todoItems()->find($todoItem->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TodoItem  $todoItem
     * @return \Illuminate\Http\Response
     */
    public function edit(TodoItem $todoItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TodoItem  $todoItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TodoItem $todoItem)
    {

        $todoItem->action = $request->action;
        $todoItem->done = $request->done;

        $todoItem->save();

        return new TodoItemResource($todoItem);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TodoItem  $todoItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(TodoItem $todoItem)
    {
        $todoItem->delete();

        return new TodoItemResource($todoItem);
    }
}
