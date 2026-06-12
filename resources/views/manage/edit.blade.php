@extends('layouts.app')

@section('title', 'Edit Tugas')

@section('content')
<h1>Edit Tugas</h1>

<form action="{{ route('manage.update', $task->id) }}" method="POST" class="form-container">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Nama Tugas</label>
        <input type="text" name="title"
               value="{{ $task->title }}" required>
    </div>
     <div class="form-group">
        <label>Deskripsi</label>
        <input type="text" name="description" value="{{ $task->description }}" required>
    </div>
    <div class="form-group">
        <label>Deadline</label>
        <input type="date" name="deadline"
               value="{{ $task->deadline }}" required>
    </div>

    <button class="btn btn-primary">Update</button>
</form>
@endsection
