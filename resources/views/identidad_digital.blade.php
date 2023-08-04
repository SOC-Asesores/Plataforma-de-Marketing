@extends('layouts.app_identidad')

@section('content')
<style>
    
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
                            <li><a href="{{url('/')}}/identidad_presentacion">Tarjeta de presentación digital</a></li>
                            <li><a href="{{url('/')}}/identidad_digital" class="active">Identificación SOC</a></li>
                            <li><a href="{{url('/')}}/identidad_firma">Firma de correo</a></li>
                            <li class="imprimir_link"><a href="{{url('/')}}/imprimir">Imprimir tarjetas</a></li>
                        
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <h1>Identificación SOC</h1>
                    <p>Crea tu nueva indentificación SOC</p>
                    <form action="{{route('sendIdentidadTarjeta')}}" method="post">
                        @csrf
                        <label for="">Nombre Completo</label>
                        <input type="text" placeholder="Ej. Juan Hernández" name="nombre" required>
                        <label for="">Puesto</label>
                        <input type="text" placeholder="Ej. Asesor hipotecario" name="puesto" required>
                        <label for="">Teléfono de contacto</label>
                        <input type="number" placeholder="Ej. xx xxxx xxxx" name="telefono">
                        <label for="">Correo electrónico</label>
                        <input type="email" placeholder="Ej. email@dominio.com" name="email" required>
                        <p style="color: #006D4E; margin-top: 5%">Foto</p>
                        <input type="text" placeholder="Url de tu foto" name="foto" required style="    width: 90%;
    display: inline-block;"><a href="" id="toltip_1" data-toggle="modal" data-target="#toltipModal_4"><img src="https://i.postimg.cc/W3BqHDr6/pregunta.png"></a>
                        <p style="color: #006D4E; margin-top: 5%">Redes Sociales</p>
                        <label for="" class="d-block">Facebook</label>
                         www.facebook.com/<input type="text" class="d-inline w-50" placeholder="ingresa tu nombre de usuario" name="facebook"><a href="" id="toltip_1" data-toggle="modal" data-target="#toltipModal_1"><img src="https://i.postimg.cc/W3BqHDr6/pregunta.png"></a>
                        
                        www.instagram.com/<input type="text" class="d-inline w-50" placeholder="ingresa tu nombre de usuario" name="instagram"><a href="" id="toltip_2" data-toggle="modal" data-target="#toltipModal_2"><img src="https://i.postimg.cc/W3BqHDr6/pregunta.png"></a>
                       
                        www.tiktok.com/<input type="text" class="d-inline w-50" placeholder="ingresa tu nombre de usuario" name="twitter"><a href="" id="toltip_3" data-toggle="modal" data-target="#toltipModal_3"><img src="https://i.postimg.cc/W3BqHDr6/pregunta.png"></a>
                        <input type="submit" value="Crear tarjeta de presentación" placeholder="Crear identificación SOC">
                    </form>
                </div>
                <div class="col-md-4 d-flex justify-content-center flex-column text-center">
                    <h1 class="text-center">Mi nueva tarjeta digital</h1>
                    @isset($url)
                        <a href="{{url('/')}}/tarjeta_digital/{{$url}}" target="_blank">{{url('/')}}/tarjeta_digital/{{$url}}</a>
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
    <!-- Modal -->
    <div class="modal" id="toltipModal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header justify-content-center">
            <h2 class="text-center" style="color: #fff">¿Cómo obtengo el link de la fotografía?</h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <img src="{{ url('img/cerca.png') }}" alt="">
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img class="img-fluid" src="{{ url('img/toltip_4.jpg') }}" alt="">
                    </div>
                    <div class="col-md-6">
                        <p style="color: #fff; font-weight: lighter; font-size: 1.2rem;" class="text-left">La fotografia debe estar almacenada en alguna plataforma como por ejemplo, Facebook o Linkedin.</p>
                        <p style="color: #fff; font-weight: lighter; font-size: 1.2rem;" class="text-left">Una vez que hayas indentificado la foto que quieres mostrar das clic derecho sobre ella, se desplegará un menú de opciones, selecciona la opción "copiar dirección de la imagen y pégala en el campo de URL de la foto.</p>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
