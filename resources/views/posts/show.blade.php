@extends('layouts.app')

@section('title')
Player Page
@endsection

@section('content')
{{-- <?php
echo "<pre>";
var_dump($post) ?> --}}
  @if(session('status'))
  <div style="background: red;">
    {{ session('status') }}
  </div>
@endif
  <div>The div of the page</div>
  @if(@isset($post['title']))
  <h2>{{$post['title']}}</h2>
  @endisset
   @if(@isset($post['content']))
   <h3>{{$post['content']}}</h3>
  @endisset
<h4>Comments</h4>
@forelse($post['comments'] as $comment)
    <p>{{ $comment->content }}, added {{ $comment->created_at->diffForHumans() }}</p>
@empty
    <p>No comments yet!</p>
    @endforelse

@endsection

