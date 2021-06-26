<?php

namespace App\Http\Controllers;

use App\Models\Disquera;
use Illuminate\Http\Request;

class DisqueraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros['disqueras']=Disquera::paginate(20);
        return view('disquera.index', $registros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('disquera.create');
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
            'direccion'=>'required',
            'estado'=>'required',
            'telefono'=>'required',
        ];
        $this->validate($request, $campos);

        $datosdisquera=request()->except('_token');

        // ver si la foto está llegando
        // if($request->hasFile('photo')){
        //     $datosalbum['photo']=$request->file('photo')->store('uploads', 'public');
        // }
        Disquera::insert($datosdisquera);
       
         return redirect('disquera')->with('msn','Disquera registrada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disquera  $disquera
     * @return \Illuminate\Http\Response
     */
    public function show(Disquera $disquera)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Disquera  $disquera
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $disquera=Disquera::findOrFail($id);
        return view('disquera.edit',compact('disquera'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Disquera  $disquera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $campos=[
            'nombre'=>'required',
            'direccion'=>'required',
            'estado'=>'required',
            'telefono'=>'required',
        ];

        $this->validate($request, $campos);

        $datosdisquera=request()->except('_token','_method');

        Disquera::where('id','=',$id)->update($datosdisquera);
        return redirect('disquera')->with('msn','Disquera actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disquera  $disquera
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Disquera::destroy($id);
        return redirect('disquera')->with('msn','Disquera eliminada exitosamente');

    }
}
