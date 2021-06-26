<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use App\Models\Disquera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros['artistas']=Artista::paginate(20);
        $registros['disqueras']=Disquera::all();

        return view('artista.index', $registros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $disqueras=Disquera::all();

        return view('artista.create', compact('disqueras'));
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
            'apellido'=>'required',
            'documento'=>'required',
            'email'=>'required',
            'fechaNacimiento'=>'required',
            'iddisqueraFK'=>'required',
            'nombreaArtistico'=>'required',
            'tipoDocumento'=>'required',
            'foto'=>'required|string|max:500|mimes:jpg,jpeg,png',
        ];
        //$this->validate($request, $campos);

        $datosartista=request()->except('_token');

        if($request->hasFile('foto')){
            $datosartista['foto']=$request->file('foto')->store('uploads', 'public');
        }

        Artista::insert($datosartista);
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
        $artista=Artista::findOrFail($id);
        $disqueras=Disquera::all();
        return view('artista.edit',compact('artista', 'disqueras'));
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
            'fechaNacimiento'=>'required|date',
            'iddisqueraFK'=>'required',
            'nombreaArtistico'=>'required|string|min:5|max:50',
            'tipoDocumento'=>'required|numeric|min:10|max:15',
            'foto'=>'required|string|max:500|mimes:jpg,jpeg,png',
        ];

        if($request->hasFile('foto')){
            $campos=['foto'=>'required|string|max:500|mimes:jpg, jpeg,png',];
        }
        $this->validate($request, $campos);

        $datosartista=request()->except('_token','_method');

        if($request->hasFile('foto')){
            $artista=Artista::findOrFail($id);
            Storage::delete('public/'.$artista->foto);
            $datosartista['foto']=$request->file('foto')->store('uploads', 'public');
            $request->file('foto')->storeAs('public/uploads', $datosartista['foto']);
        }

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

        // $artista=Artista::findOrFail($id);

        // if(Storage::delete('public/'.$artista->foto)){
        //     Artista::destroy($id);
        // }
        return redirect('artista')->with('msn','Artista eliminado exitosamente');
    }
}
