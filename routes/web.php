<?php

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Models\Task;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->paginate(10)
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();
    return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully');
})->name('tasks.destroy');


Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', [
        'task' => $task
    ]);
})->name('tasks.edit');

// Route::get('/tasks/{id}/edit', function ($id) {
//     return view('edit', [
//         'task' => Task::findOrFail($id)
//     ]);
// })->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task) {
    return view('show', [
        'task' => $task
    ]);
})->name('tasks.show');

// Route::get('/tasks/{id}', function ($id) {
//     return view('show', [
//         'task' => Task::findOrFail($id)
//     ]);
// })->name('tasks.show');

Route::post('/tasks', function (TaskRequest $request) {
    // $data = $request->validated();

    // $task = new Task($data);
    // $task->save();
    $task = Task::create($request->validated());
    return redirect()->route('tasks.show', ['task' => $task])
            ->with('success', 'Task created successfully');
})->name('tasks.store');

// Route::post('/tasks', function (Request $request) {
//     $data = $request->validate([
//         'title' => 'required|max:255',
//         'description' => 'required',
//         'long_description' => 'required',
//     ]);

//     $task = new Task($data);
//     $task->save();
//     return redirect()->route('tasks.show', ['id' => $task->id])
//             ->with('success', 'Task created successfully');
// })->name('tasks.store');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
    // $data = $request->validated();

    //$task = Task::findOrFail($id);
    // $task->update($data);
    $task->update($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id])
            ->with('success', 'Task updated successfully');
})->name('tasks.update');

// Route::put('/tasks/{id}', function ($id, Request $request) {
//     $data = $request->validate([
//         'title' => 'required|max:255',
//         'description' => 'required',
//         'long_description' => 'required',
//     ]);

//     $task = Task::findOrFail($id);
//     $task->update($data);
//     return redirect()->route('tasks.show', ['id' => $task->id])
//             ->with('success', 'Task updated successfully');
// })->name('tasks.update');
