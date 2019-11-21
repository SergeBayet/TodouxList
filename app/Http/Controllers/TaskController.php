<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\TaskCollection;
use App\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

	public function store(Request $request)
	{
		$task = new Task([
			'idUser_fk' => Auth::user()->id,
			'name' => $request->get('name'),
			'description' => $request->get('description'),
			'progress' => $request->get('progress')
		]);

		$task->save();

		return response()->json('success');
	}
	public function index() {
		$tasks = Task::where(['idUser_fk' => Auth::user()->id])->orderBy('created_at', 'DESC')->get();
		return response()->json($tasks, 200);

	}
	public function edit($id)
	{
		$task = Task::find($id);
		return response()->json($task);
	}
	public function update($id, Request $request)
	{
		$task = Task::find($id);

		$task->update($request->all());

		return response()->json('successfully updated');
	}

	public function delete($id)
	{
		$task = Task::find($id);

		$task->delete();

		return response()->json('successfully deleted');
	}
}
