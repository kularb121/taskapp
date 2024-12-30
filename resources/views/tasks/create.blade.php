@extends('layouts.app')	

@section('title', 'Create a task')

@section('content')
    <h1>Create a task</h1>
    <form  method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="10"></textarea>
        </div>
        <div>
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" rows="10"></textarea>
        </div>
        <button type="submit">Submit</button>
    </form>
@endsection