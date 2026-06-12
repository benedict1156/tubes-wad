@extends('layouts.app')

@section('title', 'Tambah Task')

@section('content')
<h1>Tambah Tugas</h1>

<form action="{{ route('tasks.store') }}" method="POST" class="form-container">
    @csrf

    <div class="form-group">
        <label>Judul</label>
        <input type="text" name="title" required>
    </div>

   

    <div class="form-group">
        <label>Deadline</label>
        <input type="date" name="deadline" required>
    </div>

    <button class="btn btn-primary">Simpan</button>
</form>
@endsection
