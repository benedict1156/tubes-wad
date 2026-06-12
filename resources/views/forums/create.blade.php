@extends('layouts.app')

@section('title', 'Tambah Forum')

@section('content')
<h1>Buat Forum Baru</h1>

<form action="{{ route('forums.store') }}" method="POST" class="form-container">
    @csrf

    <div class="form-group">
        <label>Judul Forum</label>
        <input type="text" name="title" required>
        
    </div>

    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="content" required></textarea>
    </div>

    <button class="btn btn-primary">Simpan</button>
</form>
@endsection
