@extends('layouts.app')	

@section('title', 'Create a task')

@section('styles')
<style>
    .error-message {
        color: red;
    }
</style>

@section('content')
    <h1>Create a task</h1>
    <form  method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}">
            @error('title') 
                <p class="error-message">{{ $message }}</p>    
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="10">{{ old('description')}}</textarea>
            @error('description')
                <p class="error-message">{{ $message }}</p>
            @enderror        
        </div>
        <div>

            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" rows="10">{{ old('long_description')}}</textarea>
            @error('long_description') 
                <p class="error-message">{{ $message }}</p>
            @enderror  
        </div>

        <button type="submit">Submit</button>
    </form>
@endsection