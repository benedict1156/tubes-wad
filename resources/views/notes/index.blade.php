@extends('layouts.app')

@section('title', 'Catatan')

@section('content')
<h1>Catatan</h1>

<a href="{{ route('notes.create') }}" class="btn btn-primary">
    + Tambah Catatan
</a>
<br><br>

<table class="table">
    <tr>
        <th>Judul</th>
        <th>Isi Catatan</th>
        <th>Aksi</th>
    </tr>

    @foreach ($notes as $note)
    <tr>
        <td>{{ $note->title }}</td>
        <td>{{ $note->content }}</td>
        <td class="action-group">
            <a href="{{ route('notes.edit', $note->id) }}"
               class="btn btn-warning">
                Edit
            </a>

            <form action="{{ route('notes.destroy', $note->id) }}"
                  method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger"
                        onclick="return confirm('Hapus catatan?')">
                    Hapus
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
