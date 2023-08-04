@extends('layouts.app_identidad')

@section('content')
    <section>
        <div class="container-fluid">
            <div class="row tarjetas-form">
                <div class="col-md-3">
                    <div class="row">
                        <ul>
                            <li><a href="{{url('/')}}/identidad_presentacion">Tarjeta de presentación</a></li>
                            <li><a href="{{url('/')}}/identidad_digital">Identificación SOC</a></li>
                            <li><a href="{{url('/')}}/identidad_firma">Firma de correo</a></li>
                            <li class="imprimir_link"><a href="{{url('/')}}/imprimir" class="active">Imprimir tarjetas</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    @if(isset($imprimir))
                        <div class="alert alert-success mt-4" role="alert">
                            <strong>Bien</strong> tus imagenes han sido enviadas para impresión.
                        </div>
                    @else
                    @endif
                    <h1>Imprimir tarjetas de presentación</h1>
                    <p class="blue-color"><strong>Costos</strong></p>
                    <ul style="list-style: disc; padding-left: 1rem;">
                        <li>La impresión de las tarjetas de presentación tiene un costo de $236 + IVA.</li>
                        <li>Puedes recogerlas en Hamburgo #290.</li>
                        <li>El costo de envío a domicilio es de $191 + IVA.</li>
                        <li>El tiempo aproximado de entrega es de 4 días hábiles</li>
                    </ul>
                    <p class="blue-color"><strong>Datos bancarios</strong></p>
                    <p>Banco de destino: BBVA</p>
                    <p>Cuenta destino: 012180001843755720</p>
                    <p>Nombre del beneficiario: SINERGIA SOC SA DE CV</p>
                    <p class="blue-color"><strong>Confirmar impresión</strong></p>
                    <form action="{{ route('sendMail') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="tarjeta"> Adjuntar tarjeta de presentación Anverso<span style="color: red;">*</span></label><br>
                        <input class="form-control" type="file" name="tarjeta" id="tarjeta" required>
                        <label for="tarjeta"> Adjuntar tarjeta de presentación Reverso<span style="color: red;">*</span></label><br>
                        <input class="form-control" type="file" name="tarjeta_2" id="tarjeta_2" required>
                        <label for="pago">Adjuntar comprobante de pago<span style="color: red;">*</span></label>
                        <input type="file" class="form-control" name="pago" id="pago" required>
                        <div>
                            <input type="submit" value="Enviar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
