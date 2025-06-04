<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Pigly</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css" rel="stylesheet">
    <style>
        body { padding-top: 2rem; }
        .error { color: red; font-size: 0.9rem; }
    </style>
</head>
<body>
    <nav class="container-fluid">
        <ul><li><strong>Pigly</strong></li></ul>
        <ul>
            <li><a href="/weight_logs">管理画面</a></li>
            <li><a href="/logout">ログアウト</a></li>
        </ul>
    </nav>

    <main class="container">
        @yield('content')
    </main>
</body>
</html>
