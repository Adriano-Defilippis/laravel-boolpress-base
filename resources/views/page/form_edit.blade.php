@extends('layout.layout_form')

@section('content')

  <a href="{{ url()->previous() }}">BACK</a>
  <form class="" action="{{ route('post.update', $post -> id) }}" method="post">
    @csrf
    @method('POST')
    <div class="form-group">
      <label for="title">Titolo</label>
      <input type="text" name="title" value="{{ $post -> title }}">
    </div>

    <div class="form-group">
      <label for="desc">Descrizione</label>
      <input type="text" name="desc" value="{{ $post -> desc }}">
    </div>

    <div class="form-group">
      <label for="content">Contenuto</label>
      <input type="text" name="content" value="{{ $post -> content }}">
    </div>

    <div class="form-group">
      <label for="author">Autore</label>
      <input type="text" name="author" value="{{ $post -> author }}">
    </div>

    <div class="form-group">
      <label for="category_id">Categoria</label><br>
      <select class="" name="category_id">
        @foreach ($categories as $categoryform)
          <option value="{{ $categoryform -> id }}"
            @if ($post -> category_id == $categoryform -> id)
              selected
            @endif
            >
            {{ $categoryform -> name }}
          </option>

        @endforeach
      </select>
    </div>

    <div class="form-group">
      <button type="submit" name="button">Edit Post</button>
    </div>

  </form>
@endsection
