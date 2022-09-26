<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Desafio Laravel - @yield('titulo')</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../../../css/master.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
    @include('app.layouts._partials.topo')
    @yield('conteudo')
  </body>
</html>