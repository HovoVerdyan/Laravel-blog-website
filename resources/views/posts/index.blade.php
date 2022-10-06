@extends('layouts.app')

@section('title', 'Player Page')

@section('content')
@if(session('status'))
    <div style="background: red;">
      {{ session('status') }}
    </div>
 @endif
@foreach ($post as $unique)
    <p>The name of the post is {{ $unique->title }}</p>
    <hr>
    <p>The name of the post is {{ $unique->content }}</p>
    @if ($unique->comments_count)
        <p>{{ $unique->comments_count }} comments</p>
    @else
        <p>No comments yet!</p>
    @endif
    <div>
        <form action="{{ route('posts.destroy', ['post' => $unique->id]) }}" method="POST">
          @csrf
          @method('DELETE')
          <input type="submit" value="Delete">
        </form>
      </div>


@endforeach
@endsection



