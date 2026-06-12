@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1>Dashboard</h1>

<div class="grid">
    <div class="card">
        <h3>Total Tugas</h3>
        <p>{{ count($tasks) }}</p>
    </div>

    <div class="card">
        <h3>Total Forum</h3>
        <p>{{ count($forums) }}</p>
    </div>

    <div class="card">
        <h3>Total Catatan</h3>
        <p>{{ count($notes) }}</p>
    </div>
</div>
@endsection
