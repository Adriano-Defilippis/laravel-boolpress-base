@extends('layout.layout_index')
@section('content')

  <aside class="">
    @include('components.aside')
  </aside>

  <div class="wrapper-box">
    @foreach ($posts as $post)
      <div class="box">
        <span>Titolo Post:</span>
        <p>{{ $post -> title }}</p>
        <span>Descrizione Post:</span>
        <p>{{ $post -> desc }}</p>
        <span>Autore del Post:</span>
        <p>{{ $post -> author }}</p>
        @if ($post -> img)
          <div class="img-post">
            <img src="img/{{ $post -> img }}" alt="img/{{ $post -> img }}">
          </div>
        @endif

        <div class="actions">
          @include('components.link_actions')
        </div>
      </div>
    @endforeach

  </div>

@endsection
