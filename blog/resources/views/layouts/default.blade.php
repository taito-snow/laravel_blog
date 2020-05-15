<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
  <header>
    <div class="title">
      <h1>LaravelとSQLiteで<br>誰でも編集可能なブログページを作ってみた</h1>
    </div>
  </header>

  <div class="container">
    @yield('content')
  </div>
  
  <footer>
  </footer>
</body>
</html>