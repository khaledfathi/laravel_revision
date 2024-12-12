
@extends('tasks.layouts.main-task-layout')
@section('title', 'Task Details')
    
@if ($task)
    @section('header', "View Task #$task->id")
@endif


@section('content')
<div>
    @if ($task)
        <label for="">Title</label>
        <p>{{$task->title}}</p>
        <label for="">Description</label>
        <p>{{$task->description}}</p>
        <label for="">Long Description</label>
        <p>{{$task->longDescription}}</p>
        <label for="">Status : {{$task->completed ? 'Completed': 'Not Completed'}}</label>
        <br><br>
        <a href="{{route('task.edit', ['id'=>$task->id])}}">Edit</a><br><br>
        <form method="POST" action="{{route('task.destroy' , ['id'=>$task->id])}}">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete">
        </form>
    @else
        <h4>Task not found !</h4>
    @endif
</div>
@endsection
