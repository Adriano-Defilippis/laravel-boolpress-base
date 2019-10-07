@extends('layout.layout_index')
@section('content')

<aside class="">
  <a href="#">NEW POST</a>
  <nav>
    <span>Categories Post</span>
    <ul>
      @foreach ($categories as $category)
        <li><a href="{{ route('showPostOfCategory', $category -> id) }}">{{ $category -> name }}</a></li>
      @endforeach
    </ul>
  </nav>

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
      <div class="actions">
        <a href="#">EDIT</a>
        <a href="#">DELETE</a>
      </div>
    </div>
  @endforeach

  </div>

@endsection
