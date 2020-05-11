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
       $this->validar($request);

        $input = $request->all();
        Directorio::create($input);

        return response()->json([
            'res' => true,
            'message' => 'Registro insertado correctamente'
        ]);
    }

    //PUT directorios/id
    public function update($id, Request $request)
    {
        //validar datos
        $this->validar($request, $id);

        $input = $request->all();
        $directorio = Directorio::find($id);
        $directorio->update($input);

        return response()->json([
            'res' => true,
            'message' => 'Registro modificado correctamente'
        ]);
    }

    //DELETE directorios/id
    public function delete($id)
    {
        Directorio::destroy($id);
        return response()->json([
            'res' => true,
            'message' => 'Registro eliminado correctamente'
        ]);
    }

    private function validar($request, $id = null)
    {
        $ruleUpdate = is_null($id) ? '' : ',' . $id;

        $this->validate($request, [
            'nombre_completo' => 'required|min:3|max:100',
            'telefono' => 'required|unique:directorios,telefono' . $ruleUpdate
        ]);
    }
}
