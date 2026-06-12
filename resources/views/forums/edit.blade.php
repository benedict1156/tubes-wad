@extends('layouts.app')

@section('title', 'Edit Forum')

@section('content')
<h1>Edit Forum</h1>

<form action="{{ route('forums.update', $forum->id) }}" method="POST" class="form-container">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Judul Forum</label>
        <input type="text" name="title" value="{{ $forum->title }}" required>
    </div>

    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="content" required>{{ $forum->content }}</textarea>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('forums.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
