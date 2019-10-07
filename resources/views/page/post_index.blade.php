@extends('layout.layout_index')
@section('content')

  <div class="wrapper-box">
    @foreach ($posts as $post)
      <div class="box">
        <span>Titolo Post:</span>
        <p>{{ $post -> title }}</p>
        <span>Descrizione Post:</span>
        <p>{{ $post -> desc }}</p>
        <span>Autore del Post:</span>
        <p>{{ $post -> author }}</p>
        <div class="actions">
          <a href="{{ route('post.showContent', $post -> id) }}">Show Content</a>
          <a href="#">EDIT</a>
          <a href="#">DELETE</a>
        </div>
      </div>
    @endforeach

  </div>

@endsection
