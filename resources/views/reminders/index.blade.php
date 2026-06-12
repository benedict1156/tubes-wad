@extends('layouts.app')

@section('title', 'Reminder')

@section('content')
<h1>Reminder</h1>

<a href="{{ route('reminders.create') }}" class="btn btn-primary">+ Tambah Reminder</a>
<br><br>

<table class="table">
    <tr>
        <th>Pesan</th>
        <th>Tanggal</th>
        <th>Aksi</th>
    </tr>

    @foreach ($reminders as $reminder)
    <tr>
        <td>{{ $reminder->pesan }}</td>
        <td>{{ $reminder->tanggal }}</td>
        <td class="action-group">
            <a href="{{ route('reminders.edit', $reminder->id) }}" class="btn btn-warning">Edit</a>

            <form action="{{ route('reminders.destroy', $reminder->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger"
                        onclick="return confirm('Hapus reminder?')">
                    Hapus
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
