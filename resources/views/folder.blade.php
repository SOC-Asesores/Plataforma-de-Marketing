@extends('layouts.main')

@section('content')
    <section class="folder-1 {{$url_folder}}">
        <h1 class="{{$url_folder}}">
            {{$title_folder}}
        </h1>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-tabs">
                        @php
                            $counter = 0;
                        @endphp
                        @foreach($folders as $key => $value)
                            @if ($counter === 0)
                                <li class="nav-item" id="folder_{{$value->id}}">
                                    <a class="nav-link active"data-toggle="tab" href="#{{$value->id}}" role="tab" aria-controls="nav-home" aria-selected="true">{{$value->name}}</a>            
                                </li>
                                
                            @else
                                <li class="nav-item" id="folder_{{$value->id}}">
                                    <a class="nav-link"data-toggle="tab" href="#{{$value->id}}" role="tab" aria-controls="nav-home" aria-selected="true">{{$value->name}}</a>
                                   
                                </li>
                               
                            @endif
                            @php
                                $counter++;
                            @endphp
                        @endforeach
                      </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="tab-content" id="nav-tabContent">
                        @php
                            $counter = 0;
                        @endphp
                        @foreach($folders as $key => $value)
                            @if ($counter === 0)
                                <div class="tab-pane fade show active" id="{{$value->id}}" role="tabpanel">
                            @else
                                <div class="tab-pane fade" id="{{$value->id}}" role="tabpanel">
                            @endif
                                <div class="container">
                                    <div class="row align-items-start">
                                        @foreach($sub_folders as $key => $sub_folder_main)
                                            @foreach ( $sub_folder_main as $key => $sub_folder)
                                                 @if ($value->id === $sub_folder->id_folder)
                                                    <div class="col-md-2">
                                                        <a href="{{url('/')}}/folder/{{$sub_folder->url}}" id="folder_{{$sub_folder->id}}">
                                                            <div class="content text-center" style="box-shadow: 0px 3px 6px #00000029; border-radius: 5px; padding: 10px">
                                                                <img src="{{url('img')}}/{{$sub_folder->img}}" class="img-fluid" alt="">
                                                                @if ($sub_folder->hide == 0)
                                                                    <p>{{$sub_folder->name}}</p>
                                                                @endif
                                                                
                                                            </div>
                                                        </a>
                                                        @if (Auth::check())
                                                            <a class="delete delete_folder text-center link_folder_{{$sub_folder->id}}" id="{{$sub_folder->id}}" href=""><i class="far fa-trash-alt"></i></a>                 
                                                        @else
                                                        @endif
                                                    </div>
                                                @endif
                                            @endforeach
                                            
                                        @endforeach
                                    </div>
                                    <div class="row align-items-start">
                                        @foreach($archives as $key => $archives_main)
                                            @foreach($archives_main as $key => $archives_file)
                                                @if (isset($archives_file->id_folder))
                                                    @if ($value->id === $archives_file->id_folder)
                                                        <div class="col-md-2">
                                                            <a href="{{url('img')}}/archivos/{{$archives_file->img}}" id="files_{{$archives_file->id}}" target="_blank">
                                                                <div class="content text-center">
                                                                    @php
                                                                        $icon = "icon";
                                                                        $imagen = explode(".", $archives_file->img);
                                                                        if (end($imagen) == "jpg" || end($imagen) == "png" || end($imagen) == "jpeg") {
                                                                            $registro_imagen = "archivos/".$archives_file->img;
                                                                            $icon = "";
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
                                                                        }else if ($imagen[1] == "jpeg") {
                                                                            $registro_imagen = "/icons/jpg.png";
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
                                                                        }else if ($imagen[1] == "xlsx") {
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
                                                                    <img src="{{url('img')}}/{{$registro_imagen}}" class="img-fluid {{$icon}}" alt="">
                                                                    @if ($archives_file->hide == 0)
                                                                        @php
                                                                            
                                                                            $cadena = substr($archives_file->img, 0, 30);
                                                                        @endphp
                                                                         <p>{{$cadena}}</p>
                                                                    @else
                                                                    @endif
                                                                </div>
                                                            </a>
                                                            @if (Auth::check())
                                                                <a class="delete delete_file text-center link_files_{{$archives_file->id}}" id="{{$archives_file->id}}" href=""><i class="far fa-trash-alt"></i></a>                 
                                                            @else
                                                            @endif
                                                        </div>
                                                    @endif
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @php
                                $counter++;
                            @endphp
                        @endforeach
                    </div> 
                </div>
            </div>
        </div>
    </section>
@endsection
