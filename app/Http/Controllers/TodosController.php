<?php

namespace App\Http\Controllers;

use App\Todo;
use App\Http\Requests\CreateTodoRequest;
use App\Http\Requests\UpdateTodoRequest;

class TodosController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTodoRequest $request)
    {
        return $request->save();
    }

    /**
     * Update the specified resource.
     *
     * @param UpdateTodoRequest $request
     * @param Todo $todo
     * @return void
     */
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        return $request->update($todo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Todo $todo
     * @return bool|null
     * @throws \Exception
     */
    public function destroy(Todo $todo)
    {
        return response()->json([
            'status' => $todo->delete(),
        ]);
    }
}
