<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use App\Golongan;
use App\Http\Requests\GolonganRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('golongan');
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
    public function store(GolonganRequest $request)
    {
        $dataGolongan = [
            //jika tdk increment tdk perlu di tulis dlm store
            //id tidak perlu ditampilkan 
            'golongan' => $request ['golongan'],
            

        ];

        return Golongan::create($dataGolongan);
        //dosen = model
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show(Golongan $golongan)
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
        $golongan = Golongan::find($id);
        return $golongan;
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
        $golongan = Golongan::find($id);

        //$dosen->tanpa spasi
        $golongan->golongan=$request['golongan'];


        $golongan->update();
        return $golongan;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($golonganDel = Golongan::destroy($id)){
            return ['success' =>  1];
        }else{
            return ['tidak success' =>  0];
        }

    }

    public function apiGolongan(){
        $golongan = Golongan::all();

        return DataTables::of($golongan)
            ->addColumn('action', function($golongan){
                return
                    '<a onclick="editForm('. $golongan->id_gol .')" class=btn btn-primary btn-xs"> <i class="glyphicon glyphicon-edit"> </i> Edit </a>' .
                    '<a onclick="deleteData('. $golongan->id_gol .')" class=btn btn-danger btn-xs"> <i class="glyphicon glyphicon-tras"> </i> Delete </a>';
            })->make(true);
    }
}
