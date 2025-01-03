@extends('layouts.app')

@section('title', 'The list of tasks')
{{-- <h1>The list of tasks</h1> --}}


@section('content')
    <a href="{{ route('tasks.create') }}">Create a task</a>
    @forelse($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', ['task' => $task->id ]) }}">{{ $task->title }}</li>
        </div>
    @empty
        <div> There are no tasks</div>
    @endforelse

    @if ($tasks->count())
        {{$tasks->links()}}
    @endif
@endsection

{{-- @section('content')
    @if(count($tasks) > 0)
        <ul>
            @foreach($tasks as $task)
                
                <li><a href="{{ route('tasks.show', ['task' => $task->id ]) }}">{{ $task->title }}</li>
            @endforeach
        </ul>
    @else
        <div> There are no tasks</div>
    @endif
@endsection --}}
    {{-- <ul>
        @foreach($tasks as $task)
            <li>{{ $task }}</li>
        @endforeach
    </ul>
Welcome to the page
@isset($name)
    <h1>Hello, {{ $name }}</h1>
@endisset --}}