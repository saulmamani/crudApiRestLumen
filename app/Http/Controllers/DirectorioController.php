<?php


namespace App\Http\Controllers;


use App\Directorio;
use Illuminate\Http\Request;

class DirectorioController extends Controller
{
    //GET directorios
    public function index(Request $request)
    {
        if($request->has('txtBuscar'))
        {
            return Directorio::whereTelefono($request->txtBuscar)
                            ->orWhere('nombre_completo', 'like', '%' . $request->txtBuscar . '%')->get();
        }
        else
            return Directorio::all();
    }

    //GET directorios/id
    public function show($id)
    {
        return Directorio::findOrFail($id);
    }

    //POST directorios
    public function store(Request $request)
    {
        //validar datos
        $this->validate($request, [
           'nombre_completo' => 'required|min:3|max:100',
           'telefono' => 'required|unique:directorios,telefono'
        ]);

        $input = $request->all();
        Directorio::create($input);

        return response()->json([
            'res' => true,
            'message' => 'Registro insertado correctamente'
        ]);
    }
}
