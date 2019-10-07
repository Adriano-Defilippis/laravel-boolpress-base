@extends('layout.layout_form')

@section('content')

  <form class="" action="{{ route('post.store') }}" method="post">
    <div class="form-group">
      <label for="title">Titolo</label>
      <input type="text" name="title">
    </div>

    <div class="form-group">
      <label for="desc">Descrizione</label>
      <input type="text" name="desc">
    </div>

    <div class="form-group">
      <label for="content">Contenuto</label>
      <input type="text" name="content">
    </div>

    <div class="form-group">
      <label for="author">Autore</label>
      <input type="text" name="author">
    </div>

    <div class="form-group">
      <label for="category_id">Categoria</label><br>
      <select class="" name="category_id">
        @foreach ($categories as $categoryform)
          <option value="{{ $categoryform -> id }}">{{ $categoryform -> name }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <button type="submit" name="button">Create new post</button>
    </div>

  </form>
@endsection
