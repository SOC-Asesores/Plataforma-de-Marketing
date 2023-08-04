<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registros;
use App\Models\Archivos;
use App\Models\Folders;
use App\Models\Botones;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Str;
use App\Exports\ArchivesExport;
use Maatwebsite\Excel\Facades\Excel;

class ArchivosController extends Controller
{
    public function index($url, Request $request)
    {
        $registro_id = Registros::where('url',$url)->first();
        $linea = $registro_id->nombre;
        $archivos = Archivos::where('registro_id',$registro_id->id)->get();
        return view('archivos',['archivos' => $archivos, 'linea' => $linea]);
    }

    public function archivo(Request $request)
    {
    	$registro_id = intval($request->id);
    	$archivos = Archivos::where('id',$registro_id)->get();
    	return response()->json(['archivos' => $archivos]);
    }

    public function archivos(Request $request)
    {
    	$registro_id = intval($request->id);
    	$archivos = Archivos::where('id',$registro_id)->get();
    	return response()->json(['archivos' => $archivos]);
    }
    public function searchFiles(Request $request)
    {
        $search = $request->search;
        $archivos = Archivos::where("count", '>', 0)->where('nombre', 'like',  '%'.$search.'%')->orderBy('count', 'DESC')->get();
         return view('layouts/dashboard',['archivos' => $archivos]);
    }

    public function searchFolders(Request $request)
    {
        $search = $request->search;
        $archivos = Folders::where("count", '>', 0)->where('name', 'like',  '%'.$search.'%')->orderBy('count', 'DESC')->get();
         return view('layouts/dashboard-2',['archivos' => $archivos]);
    }

    public function delete_multiple(Request $request)
    {
        foreach ($request->archivos as $key => $value) {
            $id = intval($value);
            $files = Archivos::where('id', $id)->first();
                $path = public_path()."/archivos/".$files->url;
                File::delete($path);
            Archivos::destroy($id);
        }

        return "Success";
    }
    public function delete(Request $request)
    {
        $id = intval($request->id);
        $files = Archivos::where('id', $id)->first();
            $path = public_path()."/archivos/".$files->url;
            File::delete($path);
        Archivos::destroy($id);

        return "Success";
    }
    public function export(Request $request) 
    {
        $archivos = Archivos::whereBetween('updated_at', [$request->fecha_inicio, $request->fecha_fin])->get();
         return view('layouts/dashboard',['archivos' => $archivos]);
    }
    public function export2(Request $request) 
    {
        $archivos = Folders::whereBetween('updated_at', [$request->fecha_inicio, $request->fecha_fin])->get();
         return view('layouts/dashboard-2',['archivos' => $archivos]);
    }
    public function saveName(Request $request)
    {
        $archivos = Archivos::find($request->id);
        $url = Str::slug($request->name, '-');
        $url = $url."-".rand(0,10);
        $archivos->nombre = $request->name;
        if ($request->folder != "") {
            $archivos->categoria = $request->folder;
        }
        $archivos->url = $url;
        $archivos->save();
        return "suceess";
    }
    public function dashboard(Request $request)
    {
        $archivos = Archivos::where("count", '>', 0)->orderBy('count', 'DESC')->paginate(20);

        return view('layouts/dashboard',['archivos' => $archivos]);
    }
    public function dashboard2(Request $request)
    {
        $archivos = Folders::where("count", '>', 0)->orderBy('count', 'DESC')->paginate(20);

        return view('layouts/dashboard-2',['archivos' => $archivos]);
    }
    public function dashboard3(Request $request)
    {
        $archivos = Botones::where("count", '>', 0)->orderBy('count', 'DESC')->paginate(20);

        return view('layouts/dashboard-3',['archivos' => $archivos]);
    }
    public function updateCount(Request $request)
    {
        $type = $request->type;
        $id = $request->id;
        if ($type == "archives") {
            $archivos = Archivos::find($id);
            $count = $archivos->count;
            if ($count == null) {
                $count = 1;
            }else{
                $count++;
            }
            $archivos->count = $count;
            $archivos->save();
            return "Success";
        }elseif($type == "folders"){
            $archivos = Folders::find($id);
            $count = $archivos->count;
            if ($count == null) {
                $count = 1;
            }else{
                $count++;
            }
            $archivos->count = $count;
            $archivos->save();
            return "Success";
        }else{
            return "Datos incorrectos";
        }
    }
    public function updateCountButton(Request $request)
    {
        $id = $request->id;
        if ($id == "button_redes") {
            $archivos = Botones::find(1);
            $count = $archivos->count;
            if ($count == null) {
                $count = 1;
            }else{
                $count++;
            }
            $archivos->count = $count;
            $archivos->save();
            return "Success";
        }elseif($id == "button_solicitud"){
            $archivos = Botones::find(2);
            $count = $archivos->count;
            if ($count == null) {
                $count = 1;
            }else{
                $count++;
            }
            $archivos->count = $count;
            $archivos->save();
            return "Success";
        }elseif($id == "button_tarjeta"){
            $archivos = Botones::find(3);
            $count = $archivos->count;
            if ($count == null) {
                $count = 1;
            }else{
                $count++;
            }
            $archivos->count = $count;
            $archivos->save();
            return "Success";
        }else{
            return "Datos incorrectos";
        }
    }
    public function insertRegistro(Request $request)
    {
        $nombre = $request->nombre;
        $categoria = $request->categoria;
        if ($categoria == null) {
            $categoria = $request->categoria_padre;
        }
        $tipo = $request->tipo;
        $descripcion = $request->descripcion;

        //Clean URL
        $url = Str::slug($nombre, '-');
        $url = $url."-".rand();

        if($request->hasfile('filenames'))
         {
            foreach($request->file('filenames') as $file)
            {

                $name = rand().time().'.'.$file->extension();
                $file->move(public_path().'/archivos/', $name);  
                Archivos::insertGetId([
                    'url' => $url,
                    'nombre' => $nombre,
                    'categoria' => $categoria,
                    'tipo' => $tipo,
                    'descripcion' => $descripcion,
                    'url' => $url,
                    'imagen' => $name,
                ]);  
            }
         }
         $folders = Folders::where("id_folder","=","0")->get();
        return view("home_user",["folders"=>$folders]);
    }
    public function categoria($categoria)
    {
        $titulo_object = Folders::where("slug","=",$categoria)->first();
        if ($titulo_object->count != null) {
            $count = $titulo_object->count+1;
        }else{
            $count = 1;
        }
        $titulo_object->count = $count;
        $titulo_object->save();
        $titulo = $titulo_object->name;
        $id_titulo = $titulo_object->slug;
        $id = $titulo_object->id;
        $archivos = Archivos::where('categoria', $categoria)->orderBy('id', 'desc')->get();
        $folders = Folders::where("id_folder","=","0")->get();
        $folders_inter = Folders::where("id_folder","=",$id)->get();

        

        return view('archivos',['archivos' => $archivos, 'titulo' => $titulo, 'folders_inter'=>$folders_inter ,'folders'=>$folders, 'id_titulo'=>$id_titulo]);
    }
}
