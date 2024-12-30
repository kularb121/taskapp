@extends('layouts.app')

@section('title', 'The list of tasks')

@section('content')
    @if(count($tasks) > 0)
        <ul>
            @foreach($tasks as $task)
                
                <li><a href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</li>
            @endforeach
        </ul>
    @else
        <div> There are no tasks</div>
    @endif
@endsection