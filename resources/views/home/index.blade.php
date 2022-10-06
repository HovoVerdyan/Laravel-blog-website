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
<div class="container">
    <div class="text-center">
        <h1 >Welocme to Laravel Course</h1>
        <div>This is all what you neen to know Laravel</div>
    </div>

</div>

@endsection
