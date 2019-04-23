<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品管理アプリ</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <header>
        <h1>@yield('title', '')</h1>

        <h1>@yield('page', '')</h1>
    </header>

    @yield('content')
</div>
</body>
</html>