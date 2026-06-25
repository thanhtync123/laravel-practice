<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
Route::get('/chao', function () {
    return 'welcome to laravel';
});
Route::get('/chao/{name}', function ($name) {
    return 'Xin chào học viên: ' . $name;
});
Route::get('/test-layout', function () {
    return view('hello');
});
Route::get('/', function () {
    $tasks = Task::latest()->paginate(10);
    return view('index', ['tasks' => $tasks]);
})->name('task.index');
Route::get('/show/{id}', function ($id) { 
    $task = Task::findOrFail($id);
    return view('show', compact('task'));
})->name('task.show');
Route::view('/task/create', 'create')->name('task.create');
Route::post('/task/store', function (TaskRequest $request) {
    $data = $request->validated();
    $task = new \App\Models\Task;
    $task->title = $data['ipt_title'];
    $task->description = $data['ipt_description'];
    $task->long_description = $data['ta_longdescription'];
    $task->save();
    return redirect()->route('task.index')->with('success', 'Đã tạo thành công');
})->name('task.store');

Route::get('/edit/{id}', function ($id) {
    $task = Task::findOrFail($id);
    return view('edit', compact('task'));
})->name('task.edit');
Route::put('/update/{id}', function ($id, TaskRequest $request) {
    $task = Task::findOrFail($id);
    $data = $request->validated();
    $task = new \App\Models\Task;
    $task->title = $data['ipt_title'];
    $task->description = $data['ipt_description'];
    $task->long_description = $data['ta_longdescription'];
    $task->save();
    return redirect()->route('task.index')->with('success', 'Đã cập nhật thành công');
})->name('task.update');
Route::delete('/delete/{id}', function ($id) {
    Task::destroy($id);
    return redirect()->back()->with('success', 'Xóa thành công');
})->name('task.delete');
Route::put('/toggle-completed/{task}',function(Task $task){
    $task->toggleCompleted();
    return redirect()->back()->with('success','Cập nhật trạng thái thành công');
})->name('task.toggle-completed');