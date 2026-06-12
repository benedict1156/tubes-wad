@extends('layouts.app')

@section('title', 'Tambah Catatan')

@section('content')
<h1>Tambah Catatan</h1>

<form action="{{ route('notes.store') }}" method="POST" class="form-container">
    @csrf

    <div class="form-group">
        <label>Judul</label>
        <input type="text" name="title" required>
    </div>

    <div class="form-group">
        <label>Isi Catatan</label>
        <textarea name="content" required></textarea>

    </div>

    <button class="btn btn-primary">Simpan</button>
</form>
@endsection
