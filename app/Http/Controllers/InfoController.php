<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InfoRequest;
use App\Models\Info;
use Illuminate\Support\Facades\Storage;

class InfoController extends Controller
{
    public function index()
    {
        $infos = Info::all();   //get
        return view('index', compact('infos'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(InfoRequest $request)
    {
        $fileName = time().'.'.$request->file->extension(); //le creamos un nombre unico
        //$request->file->move(public_path('images'), $fileName); //cada que creamos movemos al storage, dentro de public_path porque sera publicado, 'images', le crea la carpeta si no existe, y $fileName, para decirle con que nombre se va guardar

        $request->file->storeAs('public/images',$fileName); //almacenando dentro de store, se va usar con php artisan storage:link, lo cual vincula con el storage/public y lo publica en public/storage/img
        $info = new Info();
        $info->name = $request->name;
        $info->file_uri = $fileName; //also 'images'.$fileName
        $info->save();
        return redirect()->route('index');

        //return Storage::download('descarga.jpg',$info->file_uri);

        //return Storage::download('public/images/'.$fileName);
    }

    public function donwload($id)
    {
        $img = Info::find($id);
        return  Storage::download('public/images/'.$img->file_uri);;
    }
}
