<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use App\Matkul;
use App\Http\Requests\MatkulRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('matkul');
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatkulRequest $request)
    {
        $dataMatkul = [
            //jika tdk increment tdk perlu di tulis dlm store
            //id tidak perlu ditampilkan 
            'matkul' => $request ['matkul'],
            

        ];

        return Matkul::create($dataMatkul);
        //dosen = model
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Matkul  $matkul
     * @return \Illuminate\Http\Response
     */
    public function show(Matkul $matkul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Matkul  $matkul
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matkul = Matkul::find($id);
        return $matkul;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Matkul  $matkul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $matkul = Matkul::find($id);

        //$dosen->tanpa spasi
        $matkul->matkul=$request['matkul'];


        $matkul->update();
        return $matkul;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Matkul  $matkul
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($matkulDel = Matkul::destroy($id)){
            return ['success' =>  1];
        }else{
            return ['tidak success' =>  0];
        }
    }

    public function apiMatkul(){
        $matkul = Matkul::all();

        return DataTables::of($matkul)
            ->addColumn('action', function($matkul){
                return
                    '<a onclick="editForm('. $matkul->id_matkul .')" class=btn btn-primary btn-xs"> <i class="glyphicon glyphicon-edit"> </i> Edit </a>' .
                    '<a onclick="deleteData('. $matkul->id_matkul .')" class=btn btn-danger btn-xs"> <i class="glyphicon glyphicon-tras"> </i> Delete </a>';
            })->make(true);
    }
}
