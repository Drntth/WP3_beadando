@extends('layouts.main')

@section('content')

<h1>Profile</h1>

<ul>
    <li>Name: {{ $user->name }}</li>
    <li>Email: {{ $user->email }}</li>
    <li>Created At: {{ $user->created_at }}</li>
</ul>

@endsection