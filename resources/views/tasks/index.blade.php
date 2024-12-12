@extends('tasks.layouts.main-layout')
@section('title', 'Tasks - Home')
@section('header', 'Tasks Note App')

@section('style')
<style>
    ul{
        padding: 0;
        list-style: none;
    }
    .page-number{
        display: inline;
    }
</style>
@endsection

@section('content')
    <div>
        <h3>Task Note App Content</h3>
        <a href="{{route('task.create')}}">New Task</a>
        @if (session('message'))
           <p>{{session('message')}}</p> 
        @endif
        @if ($data->tasks)
            <ul>
                @foreach ($data->tasks as $task)
                    <li><a href="{{route('task.show', ['id'=>$task->id])}}">{{$task->title}}</a></li>
                @endforeach
            </ul>
            <ul >
                @for ($i = 1; $i <= $data->pages; $i++)
                    <li class="page-number"><a href="{{route('task.index')."?page=$i"}}">{{$i}}</a> </li>
                @endfor
            </ul>
        @endif
    </div>
@endsection
