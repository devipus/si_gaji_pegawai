<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use App\Mengajar;
//untuk relasi
use App\Dosen;
use App\Jurusan;
use App\Matkul;
use App\Kelas;
use App\Http\Requests\MengajarRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosen=Dosen::all();
        $jurusan=Jurusan::all();
        $matkul=Matkul::all();
        $kelas=Kelas::all();

        return view('mengajar')
            ->with('dosen',$dosen)
            ->with('jurusan',$jurusan)
            ->with('matkul',$matkul)
            ->with('kelas',$kelas);
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
    public function store(MengajarRequest $request)
    {
        $dataMengajar = [
            //jika tdk increment tdk perlu di tulis dlm store
            //id tidak perlu ditampilkan 
            'id_dosen' => $request ['id_dosen'],
            'kd_matkul' => $request ['kd_matkul'],
            'semester' => $request ['semester'],
            'id_jurusan' => $request ['id_jurusan'],
            'id_kelas' => $request ['id_kelas'],
        ];

        return Mengajar::create($dataMengajar);
        //Mengajar = model
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mengajar  $mengajar
     * @return \Illuminate\Http\Response
     */
    public function show(Mengajar $mengajar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mengajar  $mengajar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mengajar = Mengajar::find($id);
        return $mengajar;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mengajar  $mengajar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mengajar = Mengajar::find($id);

        //$mengajar->tanpa spasi
        $mengajar->id_dosen=$request['id_dosen'];
        $mengajar->kd_matkul=$request['kd_matkul'];
        $mengajar->semester=$request['semester'];
        $mengajar->id_jurusan=$request['id_jurusan'];
        $mengajar->id_kelas=$request['id_kelas'];

        $mengajar->update();
        return $mengajar;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mengajar  $mengajar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($mengajarDel = Mengajar::destroy($id)){
            return ['success' =>  1];
        }else{
            return ['tidak success' =>  0];
        }
    }

    public function apiMengajar(){
        //$dosen = Dosen::all();

        $mengajar = Mengajar::with('dosen','matkul','jurusan','kelas')->get();
        
        return DataTables::of($mengajar)
            ->addColumn('action', function($mengajar){
                return
                    '<a onclick="editForm('. $mengajar->id_mengajar .')" class=btn btn-primary btn-xs"> <i class="glyphicon glyphicon-edit"> </i> Edit </a>' .
                    '<a onclick="deleteData('. $mengajar->id_mengajar .')" class=btn btn-danger btn-xs"> <i class="glyphicon glyphicon-tras"> </i> Delete </a>';
            })->make(true);
    }
}

?>
