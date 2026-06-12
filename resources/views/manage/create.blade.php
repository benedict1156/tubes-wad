@extends('layouts.app')

@section('title', 'Tambah Tugas')

@section('content')
<h1>Tambah Tugas</h1>

<form action="{{ route('manage.store') }}" method="POST" class="form-container">
    @csrf

    <div class="form-group">
        <label>Nama Tugas</label>
        <input type="text" name="title" required>
    </div>

     <div class="form-group">
        <label>Deskripsi</label>
        <input type="text" name="description" required>
    </div>

    <div class="form-group">
        <label>Deadline</label>
        <input type="date" name="deadline" required>
    </div>

    <button type = 'submit' class="btn btn-primary">Simpan</button>
</form>
@endsection
