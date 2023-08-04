@extends('layouts.app_user')

@section('content')
<section class="home-section home-1">
    <div class="container">
            @php
            $contador_herramientas = 0;
            @endphp
            <div class="row">
                <div class="col-12 mb-4">
                    <h2 class="titulo-categoria d-inline mr-4 pr-4" style="text-transform: capitalize;">{{$titulo}}</h2>
                    @if (Auth::check() && Auth::user()->role == 0)
                    <a href="" class="mr-4 change-name_titulo"><i class="fa-solid fa-pen-to-square"></i> Cambiar nombre</a>
                    <a href="" class="delete-folder" style="color: red" data-toggle="modal" data-target="#exampleModalDelete" data-id="{{ $id_titulo }}"><i class="far fa-trash-alt"></i> Borrar carpeta</a>
                     
                        <div>
                            <input type="text" value="{{$titulo}}" class="mb-4 d-none form-control edit_name_titulo" name="edit_name_titulo">
                            <input type="text" id="id_titulo" value="{{ $id_titulo }}" hidden name="id_titulo">
                        </div>
                        
                        
                    
                    <div>
                        <a class="save-changes-folder btn btn-info d-none mt-4" href=""><i class="fa-solid fa-floppy-disk pr-2"></i> Guardar Cambios</a>
                    </div>
                    @endif
                </div>
                <div class="col-12 mb-4">
                    @if (Auth::check() && Auth::user()->role == 0)
                        <a href="" class="mr-4 dowload-multiple d-none" style="color: #015694;"><i class="fa-solid fa-cloud-arrow-down"></i> Descargar</a>
                    
                        <a href="" class="mr-4 delete-multiple d-none" data-toggle="modal" data-target="#exampleModalDelete2" style="color: red;"><i class="fa-solid fa-trash-can"></i> Eliminar</a>
                    @endif
                    @if (count($archivos) == 0)
                        
                    @else
                        @if (Auth::check() && Auth::user()->role == 0)
                            <a href="" class="mr-4 select_multiple"><i class="fa-solid fa-circle-check"></i> Seleccionar</a>
                        @endif
                    @endif
                    
                    <a href="" class="mr-4 select_multiple-desmarcar d-none "><i class="fa-solid fa-circle-check"></i> Desmarcar</a>
                </div>
                @foreach($folders_inter as $folder_inter)
                    @if($folder_inter->slug == "gaceta" && $contador_herramientas === 0)
                                <div class="col-md-4">
                                    <a href="{{ url('/') }}/archivos/Alertas_de_los_5_pasos.pdf" target="_blank" class="" id="" base="">
                                        <div class="content-registro" style="background-image: url({{ url('/') }}/archivos/atencion-cliente.jpg);"></div>
                                        <p class="text-center">
                                            5 pasos de atención del cliente
                                        </p>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a href="http://socasesores.com/aula" class="" id="" base="">
                                        <div class="content-registro" style="background-image: url(http://socasesores.com/marketing/img/Aula-SOC.jpg);"></div>
                                        <p class="text-center">
                                            Aula SOC
                                        </p>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a href="https://www.tiendasoc.com/?doing_wp_cron=1647461064.4451539516448974609375" class="" id="" base="">
                                        <div class="content-registro" style="background-image: url(http://socasesores.com/marketing/img/tiendita.jpg);"></div>
                                        <p class="text-center">
                                            Tiendita SOC
                                        </p>
                                    </a>
                                </div>
                                @php
                                    $contador_herramientas++;
                                @endphp
                            @endif
                    <div class="col-md-4">
                        <a href="{{ url('/') }}/categoria/{{$folder_inter->slug}}">
                            <div class="content-registro" style="background-image: url({{ url('archivos') }}/{{$folder_inter->image}});"></div>
                            <p class="text-center">
                                {{$folder_inter->name}}
                            </p>
                        </a>
                    </div>
                @endforeach
                @foreach ($archivos as $registro_corporativa)
                    @php
                        $imagen = explode(".", $registro_corporativa->imagen);
                        if ($imagen[1] == "jpg" || $imagen[1] == "png") {
                            $registro_imagen = $registro_corporativa->imagen;
                        }else if ($imagen[1] == "pdf") {
                            $registro_imagen = "/icons/pdf.png";
                        }else if ($imagen[1] == "3ds") {
                            $registro_imagen = "/icons/3ds.png";
                        }else if ($imagen[1] == "aac") {
                            $registro_imagen = "/icons/aac.png";
                        }else if ($imagen[1] == "ai") {
                            $registro_imagen = "/icons/ai.png";
                        }else if ($imagen[1] == "avi") {
                            $registro_imagen = "/icons/avi.png";
                        }else if ($imagen[1] == "bmp") {
                            $registro_imagen = "/icons/bmp.png";
                        }else if ($imagen[1] == "cad") {
                            $registro_imagen = "/icons/cad.png";
                        }else if ($imagen[1] == "cdr") {
                            $registro_imagen = "/icons/cdr.png";
                        }else if ($imagen[1] == "css") {
                            $registro_imagen = "/icons/css.png";
                        }else if ($imagen[1] == "dat") {
                            $registro_imagen = "/icons/dat.png";
                        }else if ($imagen[1] == "dll") {
                            $registro_imagen = "/icons/dll.png";
                        }else if ($imagen[1] == "dmg") {
                            $registro_imagen = "/icons/dmg.png";
                        }else if ($imagen[1] == "doc") {
                            $registro_imagen = "/icons/doc.png";
                        }else if ($imagen[1] == "eps") {
                            $registro_imagen = "/icons/eps.png";
                        }else if ($imagen[1] == "fla") {
                            $registro_imagen = "/icons/fla.png";
                        }else if ($imagen[1] == "flv") {
                            $registro_imagen = "/icons/flv.png";
                        }else if ($imagen[1] == "gif") {
                            $registro_imagen = "/icons/gif.png";
                        }else if ($imagen[1] == "html") {
                            $registro_imagen = "/icons/html.png";
                        }else if ($imagen[1] == "indd") {
                            $registro_imagen = "/icons/indd.png";
                        }else if ($imagen[1] == "iso") {
                            $registro_imagen = "/icons/iso.png";
                        }else if ($imagen[1] == "js") {
                            $registro_imagen = "/icons/js.png";
                        }else if ($imagen[1] == "midi") {
                            $registro_imagen = "/icons/midi.png";
                        }else if ($imagen[1] == "mov") {
                            $registro_imagen = "/icons/mov.png";
                        }else if ($imagen[1] == "mp3") {
                            $registro_imagen = "/icons/mp3.png";
                        }else if ($imagen[1] == "mpg") {
                            $registro_imagen = "/icons/mpg.png";
                        }else if ($imagen[1] == "php") {
                            $registro_imagen = "/icons/php.png";
                        }else if ($imagen[1] == "ppt") {
                            $registro_imagen = "/icons/ppt.png";
                        }else if ($imagen[1] == "pptx") {
                            $registro_imagen = "/icons/ppt.png";
                        }else if ($imagen[1] == "ps") {
                            $registro_imagen = "/icons/ps.png";
                        }else if ($imagen[1] == "psd") {
                            $registro_imagen = "/icons/psd.png";
                        }else if ($imagen[1] == "raw") {
                            $registro_imagen = "/icons/raw.png";
                        }else if ($imagen[1] == "sql") {
                            $registro_imagen = "/icons/sql.png";
                        }else if ($imagen[1] == "svg") {
                            $registro_imagen = "/icons/svg.png";
                        }else if ($imagen[1] == "tif") {
                            $registro_imagen = "/icons/tif.png";
                        }else if ($imagen[1] == "txt") {
                            $registro_imagen = "/icons/txt.png";
                        }else if ($imagen[1] == "wmv") {
                            $registro_imagen = "/icons/wmv.png";
                        }else if ($imagen[1] == "xls") {
                            $registro_imagen = "/icons/xls.png";
                        }else if ($imagen[1] == "xml") {
                            $registro_imagen = "/icons/xml.png";
                        }else if ($imagen[1] == "zip") {
                            $registro_imagen = "/icons/zip.png";
                        }else if ($imagen[1] == "mp4") {
                            $registro_imagen = "/icons/mp4.png";
                        }else{
                            $registro_imagen = "document.png";
                        }
                    @endphp
                    <div class="col-md-4 mb-4" id="{{$registro_corporativa->id}}">
                        <div class="form-check">
                          <input class="form-check-input archivos_multiple d-none" data-id="{{$registro_corporativa->id}}" type="checkbox" value="{{ url('archivos') }}/{{$registro_corporativa->imagen}}" name="archivos_multiple[]">
                        </div>
                        <a href="/{{$registro_corporativa->url}}" class="archivo_id" id="{{$registro_corporativa->id}}" base="{{ url('archivos') }}/">
                            <div class="content-registro content-registro_archivo" style="background-image: url({{ url('archivos') }}/{{$registro_imagen}});"></div>
                            <p class="text-center">
                                {{$registro_corporativa->nombre}}
                            </p>
                        </a>
                    </div>
                @endforeach
            </div>
           
    </div>
</section>

<section class="registro-section hide">
    <a href="" class="close"><i class="fas fa-times"></i></a>
    @isset($registros)
        <img class="image_registro" src="{{ url('archivos') }}/{{$registros[0]->imagen}}" alt="">
        <div class="position-relative"><h3 class="title"><span>{{$registros[0]->nombre}}</span></h3><a href="">Cambiar nombre <i class="fa-solid fa-pen-to-square"></i></a></div>
        <p class="description">{{$registros[0]->descripcion}}</p>
        <p class="info"><span>{{$count}}</span> Archivos</p>
        <p class="date">Subido el: <span>{{date_format($registros[0]->created_at,"Y/m/d")}}</span></p>
        <a class="download" href="" files="{{$archivos}}" base="{{ url('archivos') }}/"><i class="fas fa-cloud-download-alt"></i></i> Descargar</a>
        <div class="dropdown">
          <button class="dropbtn"><i class="fas fa-share"></i>Compartir</button>
          <div class="dropdown-content">
            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{$registros[0]->url}}" target="_blank"><i class="fab fa-linkedin-in"></i> Linkedin</a>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{$registros[0]->url}}" target="_blank"><i class="fab fa-facebook-f"></i> Facebook</a>
            <a href="https://twitter.com/intent/tweet?url={{$registros[0]->url}}&text=" target="_blank"><i class="fab fa-twitter"></i> Twitter</a>
            <a href="mailto:{{$registros[0]->url}}&text=" target="_blank"><i class="fab fa-twitter"></i> Mail</a>
          </div>
        </div>
        <a class="copy" href="/{{$registros[0]->url}}"><i class="far fa-copy"></i> Copiar vínculo</a>
        @if (Auth::check() && Auth::user()->role == 0)
         <a class="delete" id="" href=""><i class="far fa-trash-alt"></i> Eliminar</a>
        @endif
    @endisset

    @empty($registros)
        <picture><img class="image_registro" src="" alt=""></picture>
        <div class="position-relative">
            <h3 class="title"> <span></span></h3>
            @if (Auth::check() && Auth::user()->role == 0)
                <div>
                    <input type="text" class="d-none form-control edit_name" name="edit_name">
                    <input type="text" id="edit_id" hidden name="edit_id">
                </div>
                <div class="change-folder d-none">
                    <select name="category_padre_edit" class="custom-select" id="category_padre_edit">
                        <option value="" selected hidden>Guardar en</option>
                         @foreach($folders as $folder)
                          <option value="{{ $folder->slug }}" parent="">{{ $folder->name }}</option>
                        @endforeach
                    </select>
                    <select name="categoria" id="category_edit" class="category_change d-none custom-select"></select>
                </div>
                <a href="" class="change-name">Cambiar nombre <i class="fa-solid fa-pen-to-square"></i></a>
                <a href="" class="change-folder-link">Mover de carpeta <i class="fa-solid fa-folder"></i></a>
            @endif
        </div>
        <p class="description"></p>
        <a class="save-changes btn btn-info d-none" href=""><i class="fa-solid fa-floppy-disk"></i>Guardar Cambios</a>
        <a class="download" href="" files="[]" base="{{ url('archivos') }}/" download><i class="fas fa-cloud-download-alt"></i></i> Descargar</a>
        <div class="dropdown">
          <button class="dropbtn"><i class="fas fa-share"></i>Compartir</button>
          <div class="dropdown-content">
            <a id="linkedin" href="" target="_blank"><i class="fab fa-linkedin-in"></i> Linkedin</a>
            <a id="facebook" href="" target="_blank"><i class="fab fa-facebook-f"></i> Facebook</a>
            <a id="twitter" href="" target="_blank"><i class="fab fa-twitter"></i> Twitter</a>
            <a id="whatsapp" href="" target="_blank"><i class="fab fa-whatsapp"></i>Whatsapp</a>
            <a id="mailto" href=""><i class="fas fa-envelope"></i>Correo</a>
          </div>
        </div>
        <a class="copy" href="" ><i class="far fa-copy"></i> Copiar vínculo</a>
        @if (Auth::check() && Auth::user()->role == 0)
         <a class="delete-file" id="" href=""><i class="far fa-trash-alt"></i> Eliminar</a>  
        @endif
    @endempty
</section>
<!-- Modal -->
<div class="modal" id="exampleModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center w-100" id="exampleModalLabel">¿Deseas eliminar la carpeta?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <a href="" class="delete-button-confirm" data-id=""><i class="far fa-trash-alt" aria-hidden="true"></i> Sí eliminar</a>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="exampleModalDelete2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center w-100" id="exampleModalLabel">¿Deseas eliminar estos archivos?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <a href="" class="delete-multiple-send" data-id=""><i class="far fa-trash-alt" aria-hidden="true"></i> Sí eliminar</a>
      </div>
    </div>
  </div>
</div>
@endsection
