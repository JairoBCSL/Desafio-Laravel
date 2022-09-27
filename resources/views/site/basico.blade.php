<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Desafio Laravel</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../../css/master.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
    @include('site._partials.topo')
    <div class="conteudo-pagina">
      <div class="titulo-pagina-2">
        <p>@yield('titulo-final')</p>
      </div> 
      <div class="informacao-pagina">
        <div style="width: @yield('largura')%;margin-left: auto; margin-right: auto;">
          @yield('final')
        </div>
      </div>
    </div>
  </body>
</html>