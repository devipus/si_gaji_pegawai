<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use Excel;
use App\Dosen;
//untuk relasi
use Validator;
use App\Golongan;
use App\Pangkat;
use App\Http\Requests\DosenRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $golongan=Golongan::all();
        $pangkat=Pangkat::all();

        return view('dosen')
            ->with('golongan',$golongan)
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
    public function store(DosenRequest $request)
    {
        $dataDosen = [
            //jika tdk increment tdk perlu di tulis dlm store
            //id tidak perlu ditampilkan 
            'nama' => $request ['nama'],
            'alamat' => $request ['alamat'],
            'hp' => $request ['hp'],
            'id_gol' => $request ['id_gol'],
            'status' => $request ['status'],
            'id_pangkat' => $request ['id_pangkat'],
            'ket_dos' => $request ['ket_dos'],
            'rutinitas' => $request ['rutinitas'],

        ];

        return Dosen::create($dataDosen);
        //dosen = model
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show(Dosen $dosen)
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
        $dosen = Dosen::find($id);
        return $dosen;
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
        $dosen = Dosen::find($id);

        //$dosen->tanpa spasi
        $dosen->nama=$request['nama'];
        $dosen->alamat=$request['alamat'];
        $dosen->hp=$request['hp'];
        $dosen->id_gol=$request['id_gol'];
        $dosen->status=$request['status'];
        $dosen->id_pangkat=$request['id_pangkat'];
        $dosen->ket_dos=$request['ket_dos'];
        $dosen->rutinitas=$request['rutinitas'];

        $dosen->update();
        return $dosen;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($dosenDel = Dosen::destroy($id)){
            return ['success' =>  1];
        }else{
            return ['tidak success' =>  0];
        }

    }

    public function apiDosen(){
        //$dosen = Dosen::all();

        $dosen = Dosen::with('golongan','pangkat')->get();
        
        return DataTables::of($dosen)
            ->addColumn('action', function($dosen){
                return
                    '<a onclick="editForm('. $dosen->id_dosen .')" class=btn btn-primary btn-xs"> <i class="glyphicon glyphicon-edit"> </i> Edit </a>' .
                    '<a onclick="deleteData('. $dosen->id_dosen .')" class=btn btn-danger btn-xs"> <i class="glyphicon glyphicon-tras"> </i> Delete </a>';
            })->make(true);
    }

    public function dosenExport(){
        $dosen = Dosen::select('nama', 'alamat', 'hp', 'id_gol', 
            'status', 'id_pangkat', 'ket_dos', 'rutinitas')->get();

        return Excel::create('data_dosen', function($excel) use ($dosen){
            $excel->sheet('mysheet', function($sheet) use ($dosen){
                $sheet->fromArray($dosen);
            });
        })->download('xls');
    }
}
