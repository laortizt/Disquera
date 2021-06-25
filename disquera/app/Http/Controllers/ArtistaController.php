<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use Illuminate\Http\Request;

class ArtistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros['artista']=Artista::paginate(20);
        return view('artista.index', $registros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artista.create');
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
            'apellido'=>'required|string|min:5|max:50',
            'documento'=>'required|string|min:5|max:50',
            'email'=>'required',
            'fechaNacimiento'=>'required',
            'iddisquera'=>'required',
            'nombreArtistico'=>'required',
            'tipoDocumento'=>'required',

            // 'foto'=>'required|string|max:500|mimes:jpg,jpeg,png',
        ];
        $this->validate($request, $campos);

        $datosartista=request()->except('_token');

        // ver si la foto está llegando
        // if($request->hasFile('photo')){
        //     $datosalbum['photo']=$request->file('photo')->store('uploads', 'public');
        // }
        Artista::insert($datosartista);
        // return response()->json($datoscliente);
        return redirect('artista')->with('msn','Artista registrado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function show(Artista $artista)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album=Artista::findOrFail($id);
        return view('artista.edit',compact('artista'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $campos=[
            'nombre'=>'required|string|min:5|max:50',
            'apellido'=>'required|string|min:5|max:50',
            'documento'=>'required|string|min:5|max:50',
            'email'=>'required',
            'fechaNacimiento'=>'required',
            'iddisquera'=>'required',
            'nombreArtistico'=>'required',
            'tipoDocumento'=>'required',
            // 'foto'=>'required|string|max:500|mimes:jpg,jpeg,png',
        ];
        //  if($request->hasFile('photo')){
        //     $campos=['photo'=>'required|string|max:500|mimes:jpg, jpeg,png',];
        //  }
         $this->validate($request, $campos);

        $datosartista=request()->except('_token','_method');

        // if($request->hasFile('photo')){
        //     $cliente=Cliente::findOrFail($id);
        //     Storage::delete('public/'.$cliente->photo);
        //     $datoscliente['photo']=$request->file('photo')->store('uploads', 'public');
        //     // $request->file('photo')->storeAs('public/uploads', $datoscliente['photo']);
        // }

        Artista::where('id','=',$id)->update($datosartista);
        return redirect('artista')->with('msn','Artista actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        Artista::destroy($id);
        

        // $album=Album::findOrFail($id);

        // if(Storage::delete('public/'.$album->photo)){
        //     Album::destroy($id);
        // }
        return redirect('artista')->with('msn','Alrtista eliminado exitosamente');
    }
}
