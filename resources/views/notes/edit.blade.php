@extends('layouts.app')

@section('title', 'Edit Catatan')

@section('content')
<h1>Edit Catatan</h1>

<form action="{{ route('notes.update', $note->id) }}" method="POST" class="form-container">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Judul</label>
        <input type="text" name="title" value="{{ $note->title }}" required>
    </div>

    <div class="form-group">
        <label>Isi Catatan</label>
        <textarea name="content" required>{{ $note->content }}</textarea>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('notes.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
