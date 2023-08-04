@extends('layouts.app_identidad')

@section('content')
    <section>
        <div class="container-fluid">
            <div class="row tarjetas-form align-items-center">
                <div class="col-md-5">
                    <h1>Personaliza tus posters</h1>
                    <form action="{{route('sendIdentidadPosters')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="linea">Selecciona tu linea de negocio</label>
                            <select class="custom-select mb-4" id="linea" name="linea">
                                <option value="" hidden></option>
                              <option value="Hipotecario">Hipotecario</option>
                              <option value="Empresarial">Empresarial</option>
                              <option value="Seguros">Seguros</option>
                              <option value="Automotriz">Automotriz</option>
                            </select>
                            <div class="poster_hipotecario poster_select d-none">
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" id="hipotecario1" name="imagen_select" value="hipotecario1">
                                  <label class="form-check-label" for="hipotecario1"><img width="150" src="{{ url('https://prmarketing.socasesores.com/posters/poster1-1.png') }}" alt=""></label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" id="hipotecario2" name="imagen_select" value="hipotecario2">
                                  <label class="form-check-label" for="hipotecario2"><img width="150" src="{{ url('https://prmarketing.socasesores.com/posters/poster1-2.png') }}" alt=""></label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" id="hipotecario3" name="imagen_select" value="hipotecario3">
                                  <label class="form-check-label" for="hipotecario3"><img width="150" src="{{ url('https://prmarketing.socasesores.com/posters/poster1-3.png') }}" alt=""></label>
                                </div>
                                
                            </div>
                            <div class="poster_automotriz poster_select d-none">
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" id="automotriz1" name="imagen_select" value="automotriz1">
                                  <label class="form-check-label" for="automotriz1"><img width="150" src="{{ url('https://prmarketing.socasesores.com/posters/poster5-1.png') }}" alt=""></label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" id="automotriz2" name="imagen_select" value="automotriz2">
                                  <label class="form-check-label" for="automotriz2"><img width="150" src="{{ url('https://prmarketing.socasesores.com/posters/poster5-2.png') }}" alt=""></label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" id="automotriz3" name="imagen_select" value="automotriz3">
                                  <label class="form-check-label" for="automotriz3"><img width="150" src="{{ url('https://prmarketing.socasesores.com/posters/poster5-3.png') }}" alt=""></label>
                                </div>
                                
                            </div>
                            <div class="poster_empresarial poster_select d-none">
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" id="empresarial1" name="imagen_select" value="empresarial1">
                                  <label class="form-check-label" for="empresarial1"><img width="150" src="{{ url('https://prmarketing.socasesores.com/posters/poster3-1.png') }}" alt=""></label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" id="empresarial2" name="imagen_select" value="empresarial2">
                                  <label class="form-check-label" for="empresarial2"><img width="150" src="{{ url('https://prmarketing.socasesores.com/posters/poster3-2.png') }}" alt=""></label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" id="empresarial3" name="imagen_select" value="empresarial3">
                                  <label class="form-check-label" for="empresarial3"><img width="150" src="{{ url('https://prmarketing.socasesores.com/posters/poster3-3.png') }}" alt=""></label>
                                </div>
                                
                            </div>
                            <div class="poster_seguros poster_select d-none">
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" id="seguros1" name="imagen_select" value="seguros1">
                                  <label class="form-check-label" for="seguros1"><img width="150" src="{{ url('https://prmarketing.socasesores.com/posters/poster4.png') }}" alt=""></label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" id="seguros2" name="imagen_select" value="seguros2">
                                  <label class="form-check-label" for="seguros2"><img width="150" src="{{ url('https://prmarketing.socasesores.com/posters/poster4-2.png') }}" alt=""></label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" id="seguros3" name="imagen_select" value="seguros3">
                                  <label class="form-check-label" for="seguros3"><img width="150" src="{{ url('https://prmarketing.socasesores.com/posters/poster4-3.png') }}" alt=""></label>
                                </div>    
                            </div>
                            
                          </div>
                        <label for="">Nombre de Oficina</label>
                        <input type="text" placeholder="Ej. Sometra" name="nombre" required>
                        
                        <input type="submit" value="Generar posters" placeholder="Generar posters">
                    </form>
                </div>
                <div class="col-md-7 d-flex justify-content-center flex-column">
                    <h1 class="text-center">Mis nuevos posters</h1>
                    @isset($url_1)
                        <img src="{{$url_1}}" alt="" id="presentacion_firma" class="img-fluid mb-4">
                        <div class="text-right">
                            <a href="#" class="copy_img">
                                Copiar Link
                            </a>
                            <a href="#" class="download_img">
                                Descargar
                            </a>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </section>
@endsection
