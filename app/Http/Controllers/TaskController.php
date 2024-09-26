<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
   // GET /api/tasks
   public function index()
   {
       return Task::all();
   }

   // GET /api/tasks/{id}
   public function show($id)
   {
       $task = Task::find($id);
       if (!$task) {
           return response()->json(['message' => 'Task not found'], 404);
       }
       return $task;
   }


   // POST /api/tasks
   public function store(Request $request)
   {
       $validator = Validator::make($request->all(), [
           'title' => 'required|string|max:255',
           'description' => 'nullable|string',
           'completed' => 'boolean',
       ]);

       if ($validator->fails()) {
           return response()->json($validator->errors(), 422);
       }

       $task = Task::create($request->all());
       return response()->json($task, 201);
   }

   // PUT /api/tasks/{id}
   public function update(Request $request, $id)
   {
       $task = Task::find($id);
       if (!$task) {
           return response()->json(['message' => 'Task not found'], 404);
       }

       $validator = Validator::make($request->all(), [
           'title' => 'string|max:255',
           'description' => 'nullable|string',
           'completed' => 'boolean',
       ]);

       if ($validator->fails()) {
           return response()->json($validator->errors(), 422);
       }

       $task->update($request->all());
       return response()->json($task, 200);
   }

   // DELETE /api/tasks/{id}
   public function destroy($id)
   {
       $task = Task::find($id);
       if (!$task) {
           return response()->json(['message' => 'Task not found'], 404);
       }
       $task->delete();
       return response()->json(['message' => 'Task deleted'], 200);
   }
}
