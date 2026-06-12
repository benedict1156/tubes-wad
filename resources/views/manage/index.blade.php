@extends('layouts.app')

@section('title', 'Manajemen Tugas')

@section('content')
<h1>Manajemen Tugas</h1>

<a href="{{ route('manage.create') }}" class="btn btn-primary">
    + Tambah Tugas
</a>

<br><br>

<table class="table">
    <tr>
        <th>Nama Tugas</th>
        <th>Deskripsi</th>
        <th>Deadline</th>
        <th>Aksi</th>
    </tr>

    @foreach ($tasks as $task)
    <tr>
        <td>{{ $task->title }}</td>
        <td>{{ $task->description }}</td>
        <td>{{ $task->deadline }}</td>
        <td class="action-group">
            <a href="{{ route('manage.edit', $task->id) }}" class="btn btn-warning">
                Edit
            </a>

            <form action="{{ route('manage.destroy', $task->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
