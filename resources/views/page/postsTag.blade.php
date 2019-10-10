@extends('layout.layout_index')
@section('content')


  <div class="wrapper-box">
    <div class="box-tag">
      <a href="{{ route('postsFromTag.show', $tag -> id) }}">
        <span>#</span>
        <p>{{ $tag -> name }}</p>
      </a>
    </div>
  </div>

  <div class="wrapper-box">

    @foreach ($tag -> posts as $post)
      <div class="box">
        <span>Titolo Post:</span>
        <p>{{ $post -> title }}</p>
        <span>Descrizione Post:</span>
        <p>{{ $post -> desc }}</p>
        <span>Autore del Post:</span>
        <p>{{ $post -> author }}</p>
        <div class="actions">
          @include('components.link_actions')
        </div>
      </div>
    @endforeach
  @endsection

  </div>
