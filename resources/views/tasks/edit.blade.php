@extends('tasks.layouts.main-layout')
@section('title', 'Edit Task')

@if ($task)
    @section('header', "Edit Task #$task->id")
@endif


@section('content')
    <div>
        @if ($task)
            <form method="POST" action="{{ route('task.update', ['id' => $task->id]) }}">
                @csrf
                @method('PUT')
                <label for="">Title</label>
                <input name="title" type="text" value="{{ $task->title }}"><br>

                <label for="">Description</label>
                <textarea name="description" id="" cols="30" rows="10">{{ $task->description }}</textarea><br>

                <label for="">Long Description</label>
                <textarea name="long_description" id="" cols="30" rows="10">{{ $task->longDescription }}</textarea><br>

                <label for="">Completed</label>
                <input name="completed" type="checkbox" {{ $task->completed ? 'checked' : null }}><br><br>
                <input type="submit" value="Update">
                <a href="{{ route('task.show', ['id' => $task->id]) }}">Cancle</a>
            </form>
        @else
            <h4>Task not found !</h4>
        @endif
    </div>
@endsection
