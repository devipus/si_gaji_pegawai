<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use App\Lpd;
use Excel;

use Validator;
use routes;
use App\Http\Requests\LpdRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LpdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('lpd');
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
    public function store(Request $request)
    {
        $dataLpd = [
            'tahun' => $request['tahun'],
            'kode_klasifikasi' => $request['kode_klasifikasi'],
            'no_surat' => $request['no_surat'],
            'uraian' => $request['uraian'],
            'tujuan_surat' => $request['tujuan_surat'],
            'tgl' => $request['tgl'],
            'jumlah' => $request['jumlah'],
            'folder' => $request['folder'],
            'boks' => $request['boks'],
            'rak' => $request['rak'],
            'ket' => $request['ket'],
            'aktif' => $request['aktif'],
            'inaktif' => $request['inaktif'],
            'retensi' => $request['retensi'],
        ];

        return Lpd::create($dataLpd);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lpd  $lpd
     * @return \Illuminate\Http\Response
     */
    public function show(Lpd $lpd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lpd  $lpd
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lpd = Lpd::find($id);
        return $lpd;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lpd  $lpd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lpd = Lpd::find($id);

        $lpd->tahun=$request['tahun'];
        $lpd->kode_klasifikasi=$request['kode_klasifikasi'];
        $lpd->no_surat=$request['no_surat'];
        $lpd->uraian=$request['uraian'];
        $lpd->tujuan_surat=$request['tujuan_surat'];
        $lpd->tgl=$request['tgl'];
        $lpd->jumlah=$request['jumlah'];
        $lpd->folder=$request['folder'];
        $lpd->boks=$request['boks'];
        $lpd->rak=$request['rak'];
        $lpd->ket=$request['ket'];
        $lpd->aktif=$request['aktif'];
        $lpd->inaktif=$request['inaktif'];
        $lpd->retensi=$request['retensi'];


        $lpd->update();
        return $lpd;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lpd  $lpd
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($lpdDel = Lpd::destroy($id)) {
            return ['success' => 1];
        } else {
            return ['tidak success' => 0];
        }
    }

    public function apiLpd()
    {
        $lpd = lpd::all();

        return DataTables::of($lpd)
            ->addColumn('action', function($lpd){
                return
                    '<a onclick="editForm('. $lpd->id_lpd .')" class=btn btn-primary btn-xs"> <i class="glyphicon glyphicon-edit"> </i> Edit </a>' .    
                    '<a onclick="deleteData('. $lpd->id_lpd .')" class=btn btn-danger btn-xs"> <i class="glyphicon glyphicon-trash"> </i> Delete </a>' ;
            })->make(true);
    }

    public function dataExport(){
        $data = Lpd::select('id_lpd', 'tahun', 'kode_klasifikasi', 'no_surat', 'uraian', 'tujuan_surat', 
            'tgl', 'jumlah', 'folder', 'boks', 'rak', 'ket', 'aktif', 'inaktif', 'retensi')->get();

        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Data lpd.xls");

        ?>

        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tahun</th>
                    <th>Kode Klasifikasi</th>
                    <th>No. Surat</th>
                    <th>Uraian Berkas</th>
                    <th>Tujuan Surat</th>
                    <th>Tanggal</th>
                    <th>Jumlah Berkas</th>
                    <th>Folder</th>
                    <th>Boks</th>
                    <th>Rak</th>
                    <th>Keteranga</th>
                    <th>Aktif</th>
                    <th>Inaktif</th>
                    <th>Retensi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    $b=1;
                    foreach ($data as $key => $value) {
                ?> 
                    <tr>
                        <td> <?php echo $b ?></td>
                        <td> <?php echo $value->tahun; ?></td>
                        <td> <?php echo $value->kode_klasifikasi; ?></td>
                        <td> <?php echo $value->no_surat; ?></td>
                        <td> <?php echo $value->uraian; ?></td>
                        <td> <?php echo $value->tujuan_surat; ?></td>
                        <td> <?php echo $value->tgl; ?></td>
                        <td> <?php echo $value->jumlah; ?></td>
                        <td> <?php echo $value->folder; ?></td>
                        <td> <?php echo $value->boks; ?></td>
                        <td> <?php echo $value->rak; ?></td>
                        <td> <?php echo $value->ket; ?></td>
                        <td> <?php echo $value->aktif; ?></td>
                        <td> <?php echo $value->inaktif; ?></td>
                        <td> <?php echo $value->retensi; ?></td>
                    </tr>
                <?php
                    $b++;
                    }

                ?>
            
            </tbody>
        </table>
<?php
    }

    public function dataImport(Request $request){
        if ($request->hasFile('file')) {
            $path = $request->file('file')->getRealPath();
            $data = Excel::load($path, function($reader){})->get();
            if (!empty($data) && $data->count()) {
                   foreach ($data as $key => $value) {
                       $lpd = new Lpd();
                       $lpd->tahun = $value->tahun;
                       $lpd->kode_klasifikasi = $value->kode_klasifikasi;
                       $lpd->no_surat = $value->no_surat;
                       $lpd->uraian = $value->uraian;
                       $lpd->tujuan_surat = $value->tujuan_surat;
                       $lpd->tgl = $value->tgl;
                       $lpd->jumlah = $value->jumlah;
                       $lpd->folder = $value->folder;
                       $lpd->boks = $value->boks;
                       $lpd->rak = $value->rak;
                       $lpd->ket = $value->ket;
                       $lpd->aktif = $value->aktif;
                       $lpd->inaktif = $value->inaktif;
                       $lpd->retensi = $value->retensi;
                       $lpd->save();
                   }
               }   
        }
        return back();
    }
    
}


   /** public function dataExport(){
        $data = Warga::select('id_lpd', 'tahun', 'kode_klasifikasi','no_surat', 'uraian', 'tujuan_surat', 'tgl', 'jumlah', 'folder', 'boks', 'rak', 'ket')->get();

        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Data lpd.xls");

        ?>

        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tahun</th>
                    <th>Kode Klasifikasi</th>
                    <th>No. Surat</th>
                    <th>Uraian Informasi</th>
                    <th>Tujuan Surat</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Folder</th>
                    <th>Boks</th>
                    <th>Rak</th>
                    <th>Keterangan</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    $b=1;
                    foreach ($data as $key => $value) {
                ?> 
                    <tr>
                        <td> <?php echo $b ?></td>
                        <td> <?php echo $value->tahun; ?></td>
                        <td> <?php echo $value->kode_klasifikasi; ?></td>
                        <td> <?php echo $value->no_surat; ?></td>
                        <td> <?php echo $value->uraian; ?></td>
                        <td> <?php echo $value->tujuan_surat; ?></td>
                        <td> <?php echo $value->tgl; ?></td>
                        <td> <?php echo $value->jumlah; ?></td>
                        <td> <?php echo $value->folder; ?></td>
                        <td> <?php echo $value->boks; ?></td>
                        <td> <?php echo $value->rak; ?></td>
                        <td> <?php echo $value->ket; ?></td>
                    </tr>
                <?php
                    $b++;
                    }

                ?>
            
            </tbody>
        </table>
<?php
    } **/
    

