<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use App\Pajak;
use App\Golongan;
use App\Http\Requests\PajakRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PajakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $golongan=Golongan::all();

        return view('pajak')
            ->with('golongan',$golongan);
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
    public function store(PajakRequest $request)
    {
        $dataPajak = [
            //jika tdk increment tdk perlu di tulis dlm store
            //id tidak perlu ditampilkan 
            'id_gol' => $request ['id_gol'],
            'pajak' => $request ['pajak'],
            

        ];

        return Pajak::create($dataPajak);
        //Pajak = model
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pajak  $pajak
     * @return \Illuminate\Http\Response
     */
    public function show(Pajak $pajak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pajak  $pajak
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pajak = Pajak::find($id);
        return $pajak;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pajak  $pajak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pajak = Pajak::find($id);

        //$Pajak->tanpa spasi
        $pajak->id_gol=$request['id_gol'];
        $pajak->pajak=$request['pajak'];

        $pajak->update();
        return $pajak;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pajak  $pajak
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($pajakDel = Pajak::destroy($id)){
            return ['success' =>  1];
        }else{
            return ['tidak success' =>  0];
        }
    }

    public function apiPajak(){
        //$Pajak = Pajak::all();

        $pajak = Pajak::with('golongan')->get();
        
        return DataTables::of($pajak)
            ->addColumn('action', function($pajak){
                return
                    '<a onclick="editForm('. $pajak->id_pajak .')" class=btn btn-primary btn-xs"> <i class="glyphicon glyphicon-edit"> </i> Edit </a>' .
                    '<a onclick="deleteData('. $pajak->id_pajak .')" class=btn btn-danger btn-xs"> <i class="glyphicon glyphicon-tras"> </i> Delete </a>';
            })->make(true);
    }
}
