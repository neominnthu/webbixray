<?php

namespace App\Http\Controllers\Backend;

use App\Models\Task;
use App\Models\TaskCompletion;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskCompletionController extends Controller
{
    public function submitTask(Request $request, $taskId)
    {
        $task = Task::findOrFail($taskId);

        // Check if user already submitted the task
        if (TaskCompletion::where('user_id', Auth::id())->where('task_id', $taskId)->exists()) {
            return redirect()->back()->with('error', 'You have already submitted this task.');
        }

        TaskCompletion::create([
            'user_id' => Auth::id(),
            'task_id' => $taskId,
            'status' => 'pending',
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task submitted for approval.');
    }

    public function approveTask($completionId)
    {
        $completion = TaskCompletion::findOrFail($completionId);
        $task = $completion->task;
        $wallet = $completion->user->wallet;

        // Approve the task and credit the user's wallet
        $completion->update(['status' => 'approved']);
        $wallet->increment('balance', $task->reward);

        return redirect()->route('admin.tasks.completions')->with('success', 'Task approved and reward given.');
    }

    public function rejectTask($completionId)
    {
        $completion = TaskCompletion::findOrFail($completionId);
        $completion->update(['status' => 'rejected']);

        return redirect()->route('admin.tasks.completions')->with('success', 'Task rejected.');
    }
}
