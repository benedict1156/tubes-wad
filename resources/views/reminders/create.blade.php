@extends('layouts.app')

@section('title', 'Tambah Reminder')

@section('content')
<h1>Tambah Reminder</h1>

<form action="{{ route('reminders.store') }}" method="POST" class="form-container">
    @csrf

    <div class="form-group">
        <label>Pesan</label>
        <input type="text" name="pesan" required>
    </div>

    <div class="form-group">
        <label>Tanggal</label>
        <input type="date" name="tanggal" required>
    </div>

    <button class="btn btn-primary">Simpan</button>
</form>
@endsection
