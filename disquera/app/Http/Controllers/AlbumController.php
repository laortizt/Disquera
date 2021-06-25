<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros['albums']=Album::paginate(20);
        return view('album.index', $registros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('album.create');return view('album.create');
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
            'nombre'=>'required|string|min:5|max:50',
            'anioPublicacion'=>'required|year',
            'idartista'=>'required',
            'idgenero'=>'required',
            'estado'=>'required',

            // 'foto'=>'required|string|max:500|mimes:jpg,jpeg,png',
        ];
        $this->validate($request, $campos);

        $datosalbum=request()->except('_token');

        // ver si la foto está llegando
        // if($request->hasFile('photo')){
        //     $datosalbum['photo']=$request->file('photo')->store('uploads', 'public');
        // }
        Album::insert($datosalbum);
        // return response()->json($datoscliente);
        return redirect('album')->with('msn','Album registrado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album=Album::findOrFail($id);
        return view('album.edit',compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $campos=[
            'nombre'=>'required|string|min:5|max:50',
            'anioPublicacion'=>'required|year',
            'idartista'=>'required',
            'idgenero'=>'required',
            'estado'=>'required',
            // 'foto'=>'required|string|max:500|mimes:jpg,jpeg,png',
        ];
        //  if($request->hasFile('photo')){
        //     $campos=['photo'=>'required|string|max:500|mimes:jpg, jpeg,png',];
        //  }
         $this->validate($request, $campos);

        $datosalbum=request()->except('_token','_method');

        // if($request->hasFile('photo')){
        //     $cliente=Cliente::findOrFail($id);
        //     Storage::delete('public/'.$cliente->photo);
        //     $datoscliente['photo']=$request->file('photo')->store('uploads', 'public');
        //     // $request->file('photo')->storeAs('public/uploads', $datoscliente['photo']);
        // }

        Album::where('id','=',$id)->update($datosalbum);
        return redirect('album')->with('msn','Album actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        Album::destroy($id);
        

        // $album=Album::findOrFail($id);

        // if(Storage::delete('public/'.$album->photo)){
        //     Album::destroy($id);
        // }
        return redirect('album')->with('msn','Album eliminado exitosamente');
    }
}
