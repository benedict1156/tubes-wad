@extends('layouts.app')

@section('title', 'Tasks')

@section('content')
<h1>Pengingat Tugas</h1>



<br>

<table class="table">
    <tr>
        <th>Judul</th>
        <th>Deskripsi</th>
        <th>Deadline</th>
        
    </tr>

    @foreach ($tasks as $task)
    <tr>
        <td>{{ $task->title }}</td>
         <td>{{ $task->description }}</td>
        <td>{{ $task->deadline }}</td>
        <td class="action-group">
          

           
        </td>
    </tr>
    @endforeach
</table>
@endsection
