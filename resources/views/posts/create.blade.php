@extends('layouts.app')

@section('title', 'Create a post')

@section('content')
<form action="{{ route('posts.store') }}" method="post">
    @csrf
    @include('posts.partials.form')
    <div><input type="submit" value="create"></div>
</form>
@endsection 
