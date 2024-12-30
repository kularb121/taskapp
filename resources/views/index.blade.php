@extends('layouts.app')

@section('title', 'The list of tasks')
{{-- <h1>The list of tasks</h1> --}}

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
    {{-- <ul>
        @foreach($tasks as $task)
            <li>{{ $task }}</li>
        @endforeach
    </ul>
Welcome to the page
@isset($name)
    <h1>Hello, {{ $name }}</h1>
@endisset --}}