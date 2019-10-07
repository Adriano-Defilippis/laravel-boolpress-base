@extends('layout.layout_index')
@section('content')


  <div class="wrapper-box">

    <div class="box-content">
      <div class="user-img">
        <img src="" alt="">
      </div>
      <h1><span>Titolo del post:</span></h1>
      <h2>{{ $post -> title }}</h2><br>
      <h1><span>Contenuto:</span></h1>
      <h2>{{ $post -> content }}</h2><br>
    </div>

  </div>

@endsection
