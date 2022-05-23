<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;
class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        if($productos->isEmpty()){
            abort(404);
        }
        return $productos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CrearProducto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $request->validate([
                
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|min:0',
            'imagen' => 'required',
            
        ]);            
       
     
        
        $productoNuevo = new Producto;
        $productoNuevo->nombre = $request->nombre;
        $productoNuevo->descripcion=$request->descripcion;
        $productoNuevo->precio= $request->precio;
        $productoNuevo->activo=1;
        if ($request->hasFile('imagen')){
           
            $file = $request->file('imagen');
            $imgPath ='img/productos/';
            $filename = time().'-'.$file->getClientOriginalName();
            $uploadSuccess = $request->file('imagen')->move($imgPath,$filename);
           
            $productoNuevo->img =  $imgPath.$filename;
            
            
          
        }

        $productoNuevo->save();

        return redirect('/')->with('mensaje', 'Producto  Guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     
        $producto = Producto::findOrFail($id);
        return view('EditarProducto',compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {       
        
     $request->validate([
                
        'nombre' => 'required',
        'descripcion' => 'required',
        'precio' => 'required|min:0',
       
        
    ]);            
  
    
    $editarProducto = Producto::find($id);
    $editarProducto->nombre = $request->nombre;
    $editarProducto->descripcion=$request->descripcion;
    $editarProducto->precio= $request->precio;
    $editarProducto->img = "13123183cdchdchcb";
    $editarProducto->activo=1;
    $editarProducto->save();

    return redirect('/')->with('mensaje', 'Producto  Editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $borrarProducto = Producto::findOrFail($id);

        unlink($borrarProducto->img);  ///// borro la imagen ////////////

        $borrarProducto->delete();
        return  redirect('/')->with('mensaje', 'Producto Eliminado');
    }
}