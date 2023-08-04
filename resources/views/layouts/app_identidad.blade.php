<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Material | SOC Asesores</title>
    <!-- Scripts -->
    <script src="{{ url('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/ab58011517.js" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="{{ url('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <header class="bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                          <a class="navbar-brand" href="{{url('/')}}">
                            <img src="https://marketing.socasesores.com/img/SOC1@300x.png" width="200" class="d-inline-block align-top" alt="">
                          </a>
                          </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>


        <main class="mt-0">
            @yield('content')
        </main>
        <footer></footer>
    </div>
</body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{ url('js/main_identidad.js') }}"></script>
      <script>
    $(document).ready(function() {  
        $('#linea').change(function(){
            var opcion = $(this).find("option:selected").attr('value');
            if(opcion == "Hipotecario"){
               $(".poster_select").addClass("d-none");
               $(".poster_hipotecario").removeClass("d-none");
            }else if(opcion == "Empresarial"){
                $(".poster_select").addClass("d-none");
                $(".poster_empresarial").removeClass("d-none");
            }else if(opcion == "Seguros"){
                $(".poster_select").addClass("d-none");
                $(".poster_seguros").removeClass("d-none");
            }else if(opcion == "Automotriz"){
                $(".poster_select").addClass("d-none");
                $(".poster_automotriz").removeClass("d-none");
            }else{

            }     
        });
     });
</script>
</html>
