<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel-CRUD</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href={{ mix("css/app.css") }}>
    </head>
    <body>

      <header>
        <h2>Header {{ $type_view }}</h2>
      </header>


      <div class="container">
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
      </div>


      <footer>
        footer
      </footer>
    </body>
</html>
