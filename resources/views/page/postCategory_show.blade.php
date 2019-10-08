@extends('layout.layout_index')
@section('content')


  <div class="wrapper-box">

    @foreach ($category -> posts as $post)
      <div actions="#"  class="box">
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

  </div>

@endsection
