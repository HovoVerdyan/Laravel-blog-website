@extends('layouts.app')

@section('title')
Player Page
@endsection

@section('content')
@if(session('status'))
    <div style="background: red;">
      {{ session('status') }}
    </div>
 @endif
<h1>The page of super player</h1>
@endsection