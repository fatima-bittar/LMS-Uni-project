@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Section</h2>
    <form action="{{ route('sections.update', ['grade'=>$grade->id, 'section'=>$section->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
        <label for="name">Section Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name', $section->name) }}" required>
    </div>
    
    <div>
        <label for="max_size">Max Size:</label>
        <input type="number" name="max_size" id="max_size" value="{{ old('max_size', $section->max_size) }}" required>
    </div>

        <button type="submit" class="btn btn-primary">Update Section</button>
    </form>
</div>
@endsection
