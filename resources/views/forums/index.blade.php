@extends('layouts.app')

@section('title', 'Forum')

@section('content')
<h1>Forum Diskusi</h1>

<a href="{{ route('forums.create') }}" class="btn btn-primary">+ Buat Forum</a>
<br><br>

<table class="table">
    <tr>
        <th>Judul</th>
        <th>Deskripsi</th>
        <th>Aksi</th>
    </tr>

    @foreach ($forums as $forum)
    <tr>
        <td>{{ $forum->title }}</td>
        <td>{{ $forum->content }}</td>
        <td class="action-group">
            <a href="{{ route('forums.edit', $forum->id) }}" class="btn btn-warning">Edit</a>

            <form action="{{ route('forums.destroy', $forum->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger"
                        onclick="return confirm('Hapus forum ini?')">
                    Hapus
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
