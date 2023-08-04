<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Administrador Plataforma Marketing | SOC Asesores</title>
    <style>
      svg{
        width: 50px;
        /* margin-top: 100px; */
        top: 18px;
        position: relative;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="http://marketing.socasesores.com/dashboard">
              <img src="{{ url('img/soc.jpg') }}" width="150" class="d-inline-block align-top" alt="">
            </a>
            <!--<form class="form-inline" method="post" action="{{ route('searchFolders') }}">
              @csrf
              <input class="form-control mr-sm-2" name="search" type="search" placeholder="Buscar por nombre" aria-label="Search">
            </form>
            <form class="form-inline ml-4" method="post" action="{{ route('export') }}">
              @csrf
              <input class="form-control mr-sm-2" name="fecha_inicio" type="date" placeholder="Buscar por nombre" aria-label="Search">
              <span> - </span>
              <input class="form-control mr-sm-2" name="fecha_fin" type="date" placeholder="Buscar por nombre" aria-label="Search">
              <input type="submit" value="Generar Reporte">
            </form>-->
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <ul class="d-inline-block" style="list-style: none;">
            <li class="d-inline-block mr-4"><a href="{{ route("dashboard") }}">Archivos</a></li>
            <li class="d-inline-block mr-4"><a href="{{ route("dashboard2") }}">Carpetas</a></li>
            <li class="d-inline-block mr-4"><a class="btn btn-primary" href="{{ route("dashboard3") }}">Botones</a></li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th>Clicks</th>
                <th>Nombre del Boton</th>
              </tr>
            </thead>
            <tbody>
             @foreach($archivos as $archivo)
              <tr>
                <th scope="row">{{ $archivo->count }}</th>
                <td>{{ $archivo->name }}</td>
               
                <td></td>
              </tr>
             @endforeach
            </tbody>
          </table>
        </div>  
        <div class="col-12">
          @if(Route::is('searchFiles'))
          @else
            {{ $archivos->links() }}
          @endif
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>