@extends('tasks.layouts.main-task-layout')
@section('title', 'New Task')
@section('header', 'New Task')


@section('content')
    <div>
        <form method="POST" action="{{ route('task.store') }}">
            @csrf
            <p>jhfsdjkfhdkjf sjd</p>
            <label for="">Title</label>
            <input name="title" type="text" value=""><br>

            <label for="">Description</label>
            <textarea name="description" id="" cols="30" rows="10"></textarea><br>

            <label for="">Long Description</label>
            <textarea name="long_description" id="" cols="30" rows="10"></textarea><br>

            <label for="">Completed</label>
            <input name="completed" type="checkbox" ><br><br>
            <input type="submit" value="Save">
        </form>
    </div>
@endsection
