<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pigly</title>
  <link href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css" rel="stylesheet">
  <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
      background: linear-gradient(to bottom right, #fbd3e9, #bbd2c5);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    main {
      width: 100%;
      display: flex;
      justify-content: center;
      padding: 1rem;
    }

    .form-card {
      background-color: #fff;
      border-radius: 20px;
      padding: 2.5rem 2rem;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }

    .form-title {
      text-align: center;
      color: #DA7BC2;
      font-size: 1.8rem;
      font-weight: bold;
      margin-bottom: 1.5rem;
    }

    .btn-pink {
      background-color: #DA7BC2;
      color: white;
      border: none;
    }

    .text-danger {
      color: red;
      font-size: 0.9rem;
    }
  </style>
</head>
<body>
  <main>
    @yield('content')
  </main>
</body>
</html>
