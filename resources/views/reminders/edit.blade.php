@extends('layouts.app')

@section('title', 'Edit Reminder')

@section('content')
<h1>Edit Reminder</h1>

<form action="{{ route('reminders.update', $reminder->id) }}" method="POST" class="form-container">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Pesan</label>
        <input type="text" name="pesan" value="{{ $reminder->pesan }}" required>
    </div>

    <div class="form-group">
        <label>Tanggal</label>
        <input type="date" name="tanggal" value="{{ $reminder->tanggal }}" required>
    </div>

    <button class="btn btn-primary">Update</button>
</form>
@endsection
