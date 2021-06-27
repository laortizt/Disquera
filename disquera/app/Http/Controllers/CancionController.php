<?php

namespace App\Http\Controllers;

use App\Models\Cancion;
use App\Models\Album;
use Illuminate\Http\Request;

class CancionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros['cancions']=Cancion::paginate(20);
        $registros['albums']=Album::all();
        return view('cancion.index', $registros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $albums=Album::all();
        $cancions=Cancion::all();
        return view('cancion.create', compact('albums', 'cancions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'nombre'=>'required',
            'duracion'=>'required',
            'fechaGrabacion'=>'required|date',
            'idAlbum'=>'required',
            'estado'=>'required',
        ];
        // $this->validate($request, $campos);

        $datoscancion=request()->except('_token');

        Cancion::insert($datoscancion);
        // return response()->json($datoscliente);
        return redirect('cancion')->with('msn','Canción registrada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cancion  $cancion
     * @return \Illuminate\Http\Response
     */
    public function show(Cancion $cancion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cancion  $cancion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cancion=Cancion::findOrFail($id);
        $albums=Album::all();
        return view('cancion.edit',compact('cancion', 'albums'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cancion  $cancion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $campos=[
            'nombre'=>'required',
            'duracion'=>'required',
            'fechaGrabacion'=>'required|date',
            'idAlbum'=>'required',
            'estado'=>'required',
            // 'foto'=>'required|string|max:500|mimes:jpg,jpeg,png',
        ];
        //  if($request->hasFile('photo')){
        //     $campos=['photo'=>'required|string|max:500|mimes:jpg, jpeg,png',];
        //  }
         $this->validate($request, $campos);

        $datoscancion=request()->except('_token','_method');

        // if($request->hasFile('photo')){
        //     $cliente=Cliente::findOrFail($id);
        //     Storage::delete('public/'.$cliente->photo);
        //     $datoscliente['photo']=$request->file('photo')->store('uploads', 'public');
        //     // $request->file('photo')->storeAs('public/uploads', $datoscliente['photo']);
        // }

        Cancion::where('id','=',$id)->update($datoscancion);
        return redirect('cancion')->with('msn','Album actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cancion  $cancion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cancion::destroy($id);
        return redirect('cancion')->with('msn','Canción eliminada exitosamente');

    }
}
