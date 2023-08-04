@extends('layouts.app_identidad')

@section('content')
<style>
    /* The alert message box */
    .alert {
  opacity: 1;
  transition: opacity 0.6s; /* 600ms to fade out */
}
.alert {

  padding: 5px;
    background-color: #079DEF;
    color: white;
    margin-bottom: 15px;
    text-align: left;
}

/* The close button */
.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

/* When moving the mouse over the close button */
.closebtn:hover {
  color: black;
}
    .modal-content{
            background: transparent;
        }
    @media (min-width: 992px){
        .modal-content{
            background: transparent;
        }
        .modal-header{
            border-bottom: 0px;
        }
.modal-lg {
    max-width: 1200px;
}}
</style>
    <section>
        <div class="container-fluid">
            <div class="row tarjetas-form">
                <div class="col-md-3">
                    <div class="row">
                        <ul>
                            <li><a href="{{url('/')}}/identidad_presentacion" class="active">Tarjeta de presentación</a></li>
                            <li><a href="{{url('/')}}/identidad_digital">Identificación SOC</a></li>
                            <li><a href="{{url('/')}}/identidad_firma">Firma de correo</a></li>
                            <li class="imprimir_link"><a href="{{url('/')}}/imprimir">Imprimir tarjetas</a></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <h1>Tarjeta de presentación</h1>
                    <p>Completa tu información</p>
                    <form action="{{route('sendIdentidadPresentacion')}}" method="post">
                        @csrf
                        <h4 style="color: #006D4E">Oficina</h4>
                        <label for="">Nombre de oficina</label>
                        <input type="text" placeholder="EJ. Soc Asesores" name="oficina" required>
                        <label for="">Link del micrositio o precalificador</label>
                        <input type="text" placeholder="Agrega la URL de tu micrositio o precalificador" name="qr" required>
                        <h4 style="color: #006D4E">Asesor</h4>
                        <label for="">Nombre Completo</label>
                        <input type="text" placeholder="Ej. Juan Hernández" name="nombre" required>
                        <label for="">Puesto</label>
                        <input type="text" placeholder="Ej. Asesor hipotecario" name="puesto" required>
                        <label for="">Teléfono de contacto</label>
                        <input type="number" placeholder="Ej. xx xxxx xxxx" name="telefono">
                        <label for="">Correo electrónico</label>
                        <input type="email" placeholder="Ej. email@dominio.com" name="email" required>
                        <label>Dirección</label>
                        <textarea  name="direccion" id="direccion" placeholder="Ej. Calle, #número, Colonia, C.P., Ciudad, Estado"></textarea>
                        
                        <h4 style="color: #006D4E">Redes Sociales</h4>
                        <label for="" class="d-block">¿Quieres mostrar tus redes sociales?</label>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="customRadio1" value="si" name="customRadio" class="custom-control-input">
                          <label class="custom-control-label" for="customRadio1">Sí</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="customRadio2" value="no" name="customRadio" checked class="custom-control-input">
                          <label class="custom-control-label" for="customRadio2">No</label>
                        </div>
                        <div class="redes-sec d-none mt-4">
                       
                        www.facebook.com/<input type="text" class="d-inline w-50" placeholder="ingresa tu nombre de usuario" name="facebook"><a href="" id="toltip_1" data-toggle="modal" data-target="#toltipModal_1"><img src="https://i.postimg.cc/W3BqHDr6/pregunta.png"></a>
                        
                        www.instagram.com/<input type="text" class="d-inline w-50" placeholder="ingresa tu nombre de usuario" name="instagram"><a href="" id="toltip_2" data-toggle="modal" data-target="#toltipModal_2"><img src="https://i.postimg.cc/W3BqHDr6/pregunta.png"></a>
                       
                        www.tiktok.com/<input type="text" class="d-inline w-50" placeholder="ingresa tu nombre de usuario" name="twitter"><a href="" id="toltip_3" data-toggle="modal" data-target="#toltipModal_3"><img src="https://i.postimg.cc/W3BqHDr6/pregunta.png"></a>
                        </div>
                        <input type="submit" value="Crear tarjeta de presentación" placeholder="Generar firma">
                    </form>
                </div>
                <div class="col-md-4 d-flex justify-content-center flex-column">
                    <h1 class="text-center">Mi nueva tarjeta de presentación</h1>
                    @isset($url_1)
                        <b>Reverso</b>
                        <img src="{{$url_1}}" alt="" id="presentacion_firma" class="img-fluid mb-4">
                        <div class="text-right">
                            <div class="alert alert_copy d-none">
                              <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                              Link copiado
                            </div>
                            <a href="#" class="copy_img">
                               Copiar Link
                            </a>
                            <a href="#" class="download_img">
                                Descargar
                            </a>
                        </div>
                    @endisset
                    
                    <br><br>
                    
                    @isset($url_2)
                        <b>Anverso</b>
                        <img src="{{$url_2}}" alt="" id="presentacion_firma_2" class="img-fluid mb-4">
                        <div class="text-right">
                            <div class="alert alert_copy_2 d-none">
                              <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                              Link copiado
                            </div>
                            <a href="#" class="copy_img_2">
                                Compartir
                            </a>
                            <a href="{{ $url_download }}" class="" style="    background-color: #079DEF;
    border-radius: 7px;
    text-align: center;
    padding: 5px 1rem;
    color: #fff;
    margin-bottom: 1rem;
    line-height: 1;">
                                Descargar
                            </a>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal" id="toltipModal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header justify-content-center">
            <h2 class="text-center" style="color: #fff">¿Cómo indentificar tu usuario?</h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <img src="{{ url('img/cerca.png') }}" alt="">
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <img class="img-fluid" src="{{ url('img/toltip_1m.jpg') }}" alt="">
                    </div>
                    <div class="col-md-5">
                        <img class="img-fluid" src="{{ url('img/toltip_1.jpeg') }}" alt="">
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal" id="toltipModal_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header justify-content-center">
            <h2 class="text-center" style="color: #fff">¿Cómo indentificar tu usuario?</h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <img src="{{ url('img/cerca.png') }}" alt="">
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <img class="img-fluid" src="{{ url('img/toltip_2.jpg') }}" alt="">
                    </div>
                    <div class="col-md-5">
                        <img class="img-fluid" src="{{ url('img/toltip_2m.jpeg') }}" alt="">
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal" id="toltipModal_3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header justify-content-center">
            <h2 class="text-center" style="color: #fff">¿Cómo indentificar tu usuario?</h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <img src="{{ url('img/cerca.png') }}" alt="">
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <img class="img-fluid" src="{{ url('img/toltip_3.jpg') }}" alt="">
                    </div>
                    <div class="col-md-5">
                        <img class="img-fluid" src="{{ url('img/toltip_3m.jpeg') }}" alt="">
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </style>

<script>
// Get all elements with class="closebtn"
var close = document.getElementsByClassName("closebtn");
var i;

// Loop through all close buttons
for (i = 0; i < close.length; i++) {
  // When someone clicks on a close button
  close[i].onclick = function(){

    // Get the parent of <span class="closebtn"> (<div class="alert">)
    var div = this.parentElement;

    // Set the opacity of div to 0 (transparent)
    div.style.opacity = "0";

    // Hide the div after 600ms (the same amount of milliseconds it takes to fade out)
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}
</script>
@endsection
