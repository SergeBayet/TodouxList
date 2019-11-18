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
		$post = new Task([
			'name' => $request->get('name'),
			'description' => $request->get('description'),
			'progress' => $request->get('progress')
		]);

		$post->save();

		return response()->json('success');
	}
	public function index() {
		$tasks = Task::where(['idUser_fk' => Auth::user()->id])->get();
		return response()->json($tasks, 200);

	}
	public function update($id, Request $request)
	{
		$post = Task::find($id);

		$post->update($request->all());

		return response()->json('successfully updated');
	}

	public function delete($id)
	{
		$post = Task::find($id);

		$post->delete();

		return response()->json('successfully deleted');
	}
}
