<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use App\Pangkat;
use App\Http\Requests\PangkatRequest;

use Validator;
use routes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PangkatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pangkat');
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
    public function store(PangkatRequest $request)
    {
        $dataPangkat = [
            //jika tdk increment tdk perlu di tulis dlm store
            //id tidak perlu ditampilkan 
            'pangkat' => $request ['pangkat'],
            

        ];

        return Pangkat::create($dataPangkat);
        //dosen = model
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show(Pangkat $pangkat)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pangkat = Pangkat::find($id);
        return $pangkat;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pangkat = Pangkat::find($id);

        //$dosen->tanpa spasi
        $pangkat->pangkat=$request['pangkat'];


        $pangkat->update();
        return $pangkat;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($pangkatDel = Pangkat::destroy($id)){
            return ['success' =>  1];
        }else{
            return ['tidak success' =>  0];
        }

    }

    public function apiPangkat(){
        $pangkat = Pangkat::all();

        return DataTables::of($pangkat)
            ->addColumn('action', function($pangkat){
                return
                    '<a onclick="editForm('. $pangkat->id_pangkat .')" class=btn btn-primary btn-xs"> <i class="glyphicon glyphicon-edit"> </i> Edit </a>' .
                    '<a onclick="deleteData('. $pangkat->id_pangkat .')" class=btn btn-danger btn-xs"> <i class="glyphicon glyphicon-tras"> </i> Delete </a>';
            })->make(true);
    }
}
