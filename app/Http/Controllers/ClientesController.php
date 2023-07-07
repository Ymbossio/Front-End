<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $url = env('URL_SERVER_API','http:://127.0.0.1');
        $response = Http::get($url.'/productos');
        $dato = $response->json();
        return view('index', compact('dato'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request) {
        $url = env('URL_SERVER_API','http:://127.0.0.1');
         Http::post($url.'/productos',[
            'Descripcion' => $request->Descripcion,
            'Categoria' => $request->Categoria,
            'precio' => $request->precio,
            'estado' => $request->estado,
        ]);

        return redirect()->route('Crear-registro.index');
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
        $url = env('URL_SERVER_API','http:://127.0.0.1');
        Http::put($url.'/productos/'.$id,[
           'Descripcion' => $request->Descripcion,
           'Categoria' => $request->Categoria,
           'precio' => $request->precio,
           'estado' => $request->estado,
       ]);

       return redirect()->route('Crear-registro.index');
    }


    public function destroy($id)
    {
        $url = env('URL_SERVER_API','http:://127.0.0.1');
        Http::delete($url.'/productos/'.$id);
       return redirect()->route('Crear-registro.index');
        
    }
}
