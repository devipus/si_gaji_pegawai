<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use App\Honor;
//untuk relasi
use App\Pangkat;
use App\Http\Requests\HonorRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pangkat=Pangkat::all();

        return view('honor')
            ->with('pangkat',$pangkat);
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
    public function store(HonorRequest $request)
    {
        $dataHonor = [
            //jika tdk increment tdk perlu di tulis dlm store
            //id tidak perlu ditampilkan 
            'id_pangkat' => $request ['id_pangkat'],
            'honor' => $request ['honor'],
            

        ];

        return Honor::create($dataHonor);
        //honor = model
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Honor  $honor
     * @return \Illuminate\Http\Response
     */
    public function show(Honor $honor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Honor  $honor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $honor = Honor::find($id);
        return $honor;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Honor  $honor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $honor = Honor::find($id);

        //$honor->tanpa spasi
        $honor->id_pangkat=$request['id_pangkat'];
        $honor->honor=$request['honor'];

        $honor->update();
        return $honor;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Honor  $honor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($honorDel = Honor::destroy($id)){
            return ['success' =>  1];
        }else{
            return ['tidak success' =>  0];
        }
    }

    public function apiHonor(){
        //$honor = honor::all();

        $honor = Honor::with('pangkat')->get();
        
        return DataTables::of($honor)
            ->addColumn('action', function($honor){
                return
                    '<a onclick="editForm('. $honor->id_honor .')" class=btn btn-primary btn-xs"> <i class="glyphicon glyphicon-edit"> </i> Edit </a>' .
                    '<a onclick="deleteData('. $honor->id_honor .')" class=btn btn-danger btn-xs"> <i class="glyphicon glyphicon-tras"> </i> Delete </a>';
            })->make(true);
    }
}
