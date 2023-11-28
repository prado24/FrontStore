<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Tallas;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Termwind\Components\Dd;
class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos=Productos::all();
        // $productos = Productos::with('tallas:id,nombre');
        return view('index',['productos'=>$productos]);

        // $productos = producto::with('categoria:id,nombre')->paginate(5);
        // return view('productos.index',['productos'=>$productos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'precio' => 'required|numeric|min:0|regex:/^\d+(\.\d{2})?$/',
            'imagen' => 'required|image|mimes:jpg,png,jpeg',
            'resumen' => 'required|min:15'
        ]);

        $nombreOriginal=time().$request->file('imagen')->getClientOriginalName();
        Productos::create([
            'titulo'=>$request->titulo,
            'precio'=>$request->precio,
            'imagen'=>$nombreOriginal,
            'resumen'=>$request->resumen
        ]);
        $request->file('imagen')->storeAs('public/productos',$nombreOriginal);
        return to_route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $productos=Productos::find($id);
        $tallas = Tallas::all();
        return view('productos.show',['productos'=>$productos, 'tallas'=>$tallas]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $productos = Productos::find($id);
        return view('productos.edit',['productos'=> $productos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'titulo' => 'required',
            'precio' => 'required|numeric|min:0|regex:/^\d+(\.\d{2})?$/',
            // 'descripcion' => 'required|min:15',
            // 'imagen' => 'required|image|mimes:jpg,png,jpeg',
            'resumen' => 'required|min:15'
        ]);
        if(empty($request->file('imagen')))
        {
            $productos = Productos::find($id);
            if ($productos) {
                $productos->titulo = $request->input('titulo');
                $productos->precio=$request->input('precio');
                $productos->resumen = $request->input('resumen');
                // $entradas->save();
            }
        }else{
            $request->validate([
                'imagen'=> 'required|image|dimensions:min_width=,min_height=288.5|mimes:jpg,png,jpeg'
            ]);
            $productos = Productos::find($id);
            if ($productos) {
                $productos->titulo = $request->input('titulo');
                $productos->precio=$request->input('precio');
                $productos->resumen = $request->input('resumen');
                //borrar archivo
                Storage::delete('public/productos/'.$productos->imagen);
                //obtener nombre del archivo
                $nombreOriginal=time().$request->file('imagen')->getClientOriginalName();
                //guardar nuevo nombre
                $productos->imagen=$nombreOriginal;
                //guardar archivo
                $request->file('imagen')->storeAs('public/productos',$nombreOriginal);
            }
        }
        $productos->save();
        
        // session()->flash('status','Se actualizo la entrada' . $request->titulo);
        return to_route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $productos=Productos::find($id);
        if($productos){
            Storage::delete('public/productos/'.$productos->imagen);
            $productos->delete();
        }

        return to_route('index');
    }
}
