@extends('layout')

@section('content')
    <h1 class="mb-4">Edit Task</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>There were some problems:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ $task->description }}</textarea>
        </div>
<div class="mb-3">
    <label class="form-label">Due Date</label>
    <input type="date" name="due_date" class="form-control" value="{{ $task->due_date }}">
</div>

        <div class="form-check mb-3">
            <input type="checkbox" name="completed" class="form-check-input" id="completed"
                {{ $task->completed ? 'checked' : '' }}>
            <label class="form-check-label" for="completed">Mark as completed</label>
        </div>
<div class="mb-3">
    <label for="tag" class="form-label">Tag</label>
    <select name="tag" id="tag" class="form-select">
        <option value="">None</option>
        <option value="Work" {{ old('tag', $task->tag ?? '') == 'Work' ? 'selected' : '' }}>Work</option>
        <option value="Personal" {{ old('tag', $task->tag ?? '') == 'Personal' ? 'selected' : '' }}>Personal</option>
        <option value="Urgent" {{ old('tag', $task->tag ?? '') == 'Urgent' ? 'selected' : '' }}>Urgent</option>
    </select>
</div>

        <button type="submit" class="btn btn-primary">💾 Update Task</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">⬅️ Back</a>
    </form>
@endsection
