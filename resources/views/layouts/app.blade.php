<!doctype html>
<html lang="fa" dir="rtl" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
          html{
    font-family:B koodak , Helvetica, sans-serif;
    font-style: oblique;
    
  }
    </style>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('extracss')
</head>
<body>
    <div id="app">
        @include('inc.nav')

        
    <div class="container">
        <main class="py-4">
        @include('inc.messages')
            @yield('content')
        </main>
    </div>
    </div>
        <script src="{{ asset('laravel-ckeditor-master/ckeditor.js') }}"></script>
    <script>CKEDITOR.replace('article-ckeditor');</script>
        
</body>
</html>
