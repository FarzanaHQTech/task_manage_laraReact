<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class TaskListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lists = TaskList::where('user_id', Auth::id())->with('tasks')->get();
        return Inertia::render('lists/index', [
            'lists' => $lists,
            'flash' => [
                'success' => session('success'),
                'error' => session('error')
            ],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:200',
            'description' => 'nullable|string',
        ]);
        TaskList::create([
            ...$validate,
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('lists.index')->with('success', 'list crreated successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(TaskList $taskList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskList $taskList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TaskList $taskList)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:200',
            'description' => 'nullable|string',
        ]);
        $taskList->update($validate);
        return redirect()->route('lists.index')->with('success', 'list Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskList $taskList)
    {
        $taskList->delete();
        return redirect()->route('lists.index')->with('success', 'list deleted successfully');
    }
}
