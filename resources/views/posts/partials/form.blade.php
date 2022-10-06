<div>
    <input type="text" name="title" value="{{ old('title', optional($post ?? null)->title) }}">
</div>
    @error('title')
      <div>There is an error in the title</div>
    @enderror
    <div>
        <input type="text" name="content" value="{{ old('content', optional($post ?? null)->content) }}"></input>
    </div>
    @if($errors->any())
    <div>
      <ul>
        @foreach ( $errors->all() as $error )
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
