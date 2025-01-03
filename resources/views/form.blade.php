@extends('layouts.app')	

@section('title', isset($task) ? 'Edit a task' : 'Create a task')


@section('styles')
    <style>
        .error-message {
            color: red;
            font-size: 0.8rem;
        }
    </style>
@endsection

@section('content')
    <form  method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task]) : route('tasks.store') }}">
        @csrf
        @if(isset($task))
            @method("PUT")
        @endif
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" 
                value="{{ $task->title ?? old('title') }}">
            @error('title') 
                <p class="error-message">{{ $message }}</p>    
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" 
                rows="10">{{ $task->description ?? old('description') }}</textarea>
            @error('description') 
                <p class="error-message">{{ $message }}</p>    
            @enderror        
        </div>
        <div>

            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" 
                rows="10">{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description') 
                <p class="error-message">{{ $message }}</p>    
            @enderror  
        </div>

        <button type="submit">Submit</button>
    </form>
@endsection