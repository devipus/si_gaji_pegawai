<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use App\Penggajian;
use App\Dosen;
use Excel;
use Validator;
use routes;
use App\Http\Requests\PenggajianRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        $dosen=Dosen::all();
        
        return view('laporan')->with('dosen',$dosen);
        
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
    public function store(PenggajianRequest $request)
    {
        $dataPenggajian = [
        
         'id_dosen' => $request ['id_dosen'],
         'tgl' => $request ['tgl'],
         'jml_hadir' => $request ['jml_hadir'],
         
         ];

         return Penggajian::create($dataPenggajian);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penggajian  $penggajian
     * @return \Illuminate\Http\Response
     */
    public function show(Penggajian $penggajian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penggajian  $penggajian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $penggajian = Penggajian::find($id);
        return $penggajian;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penggajian  $penggajian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /** $penggajian = Penggajian::find($id);
            $penggajian->tgl=$request['tgl'];
            $penggajian->jml_hadir=$request['jml_hadir'];
            
            $dosen = Dosen::where('id_dosen', $penggajian->id_dosen)->with('pangkat')->with('golongan')->with('pajak')->with('honor')->first();
            $totalGaji=(float)$dosen->honor->honor * (float)$penggajian->jml_hadir;
            
            if($dosen->pajak){
                $totalGajiBersih = $totalGaji - ($totalGaji /100 * $dosen->pajak->pajak);
            }else{
                $totalGajiBersih = $totalGaji;
            }   
        
        $penggajian->honor_satuan =$dosen->honor->honor;
        $penggajian->gaji_honor =$totalGaji;
        $penggajian->total_pajak  =$dosen->pajak ? $dosen->pajak->pajak : '';
        $penggajian->total_gaber  =$totalGajiBersih;
        $penggajian->tgl    =$penggajian->tgl. '-01';
        $penggajian->update();
        return $penggajian; */
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penggajian  $penggajian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       /** if($penggajianDel = Penggajian::destroy($id)){
            return ['success' =>  1];
        }else{
            return ['tidak success' =>  0];
        } */
    }
    
    public function  apiPenggajian()
    {
        $penggajian = Penggajian::with('dosen')->get();
        
        return DataTables::of($penggajian)
        /**->editColumn('tgl', function($v){
            return (strtotime($v->tgl) ? date('M Y', strtotime($v->tgl)) : '');
        })
        ->editColumn('jml_hadir', function($v){
            return $v->jml_hadir !=' ' ? $v->jml_hadir. ' jam' : '';
        })
        ->editColumn('total_gaber', function($v){
            return $v->total_gaber != '' ? number_format($v->total_gaber, '0', ',', '.') : '';
        })
        ->addColumn('action',function($penggajian){
            return  
                        '<a onclick="editForm('. $penggajian->id_penggajian .')" class=btn btn-primary btn-xs"> <i class="glyphicon glyphicon-edit"> </i> Edit </a>' .
                        
                        '<a onclick="deleteData('. $penggajian->id_penggajian .')" class=btn btn-danger btn-xs"> <i class="glyphicon glyphicon-trash"> </i> Delete </a>' ;
        })->addColumn('tgl',function($v){
            return (strtotime($v->tgl) ? date ('Y-m', strtotime($v->tgl)) : '');
        }) */
        ->make(true);
        
    }

    public function penggajianExport(){
        $penggajian = Penggajian::select('id_dosen', 'tgl', 'jml_hadir', 'total_gaber')->with('dosen')->get();

        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Laporan Penggajian Dosan.xls");

        ?>

        <table>
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama Dosen</td>
                    <td>Tanggal</td>
                    <td>Jumlah Hadir</td>
                    <td>Total Gaji</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $b=1;
                    foreach ($penggajian as $key => $value) {
                ?>
                <tr>
                    <td> <?php echo $b ?> </td>
                    <td> <?php echo $value->dosen->nama; ?> </td>
                    <td> <?php echo $value->tgl != '' ? date('M Y', strtotime($value->tgl)) : '' ?> </td>
                    <td> <?php echo $value->jml_hadir; ?> </td>
                    <td> <?php echo $value->total_gaber != '' ? number_format($value->total_gaber, 0, ',', '.'): '' ?> </td>
                </tr>

                <?php
                $b++;
                    }
                ?>
            
            </tbody>
        </table>
    <?php
    }

}
