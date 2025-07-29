@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Task List</h1>

    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Add New Task</a>

    @if($tasks->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>
                            @if($task->completed)
                                <span class="badge bg-success">Completed</span>
                            @else
                                <span class="badge bg-warning">Pending</span>
                            @endif
                        </td>
                        <td>{{ $task->due_date ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-info">Edit</a>

                            <form action="{{ route('tasks.toggle', $task->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-warning">
                                    {{ $task->completed ? 'Mark Incomplete' : 'Mark Complete' }}
                                </button>
                            </form>

                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this task?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No tasks found. Start by adding one.</p>
    @endif
</div>
@endsection
