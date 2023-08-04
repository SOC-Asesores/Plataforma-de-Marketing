<?php
use Illuminate\Http\Request;
use App\Models\Folders;
use App\Models\Archivos;

    function getFolders($id){
        $folders_child = Folders::where("id_folder","=",$id)->get();
        return $folders_child;
    }

    function checkFolders($categoria){
        $folders = Folders::where("slug","=",$categoria)->first();

        return $folders;
    }

    function getFoldersName($id_folder){
        $folders_child = Folders::where("id","=",$id_folder)->first();
        $valor = $folders_child->slug;
        return $valor;
    }


