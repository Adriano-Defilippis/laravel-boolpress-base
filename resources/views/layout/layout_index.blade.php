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

        <aside class="">
          <a href="{{ route('post.create') }}">NEW POST</a>
          <nav>
            <span>Categories Post</span>
            <ul>
              @foreach ($categories as $categoryy)
                <li><a href="{{ route('showPostOfCategory', $categoryy -> id) }}">{{ $categoryy -> name }}</a></li>
              @endforeach
            </ul>
          </nav>

        </aside>

        @yield('content')
      </div>


      <footer>
        footer
      </footer>
    </body>
</html>
