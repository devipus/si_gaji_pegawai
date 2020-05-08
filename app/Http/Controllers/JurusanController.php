<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use App\Jurusan;
use Excel;

use App\Http\Requests\JurusanRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jurusan');
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
    public function store(JurusanRequest $request)
    {
        $dataJurusan = [
            //jika increment tdk perlu di tulis dlm store
            //id tidak perlu ditampilkan 
            'jurusan' => $request ['jurusan'],
            

        ];

        return Jurusan::create($dataJurusan);
        //dosen = model
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function show(Jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jurusan = Jurusan::find($id);
        return $jurusan;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jurusan = Jurusan::find($id);

        //$dosen->tanpa spasi
        $jurusan->jurusan=$request['jurusan'];


        $jurusan->update();
        return $jurusan;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($jurusanDel = Jurusan::destroy($id)){
            return ['success' =>  1];
        }else{
            return ['tidak success' =>  0];
        }
    }

    public function apiJurusan(){
        $jurusan = Jurusan::all();

        return DataTables::of($jurusan)
            ->addColumn('action', function($jurusan){
                return
                    '<a onclick="editForm('. $jurusan->id_jurusan .')" class=btn btn-primary btn-xs"> <i class="glyphicon glyphicon-edit"> </i> Edit </a>' .
                    '<a onclick="deleteData('. $jurusan->id_jurusan .')" class=btn btn-danger btn-xs"> <i class="glyphicon glyphicon-tras"> </i> Delete </a>';
            })->make(true);
    }

    public function dataExport(){
        $data = Jurusan::select('id_jurusan', 'jurusan')->get();

        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Data jurusan.xls");

        ?>

        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Jurusan</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    $b=1;
                    foreach ($data as $key => $value) {
                ?> 
                    <tr>
                        <td> <?php echo $b ?></td>
                        <td> <?php echo $value->jurusan; ?></td>
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
                       $jurusan = new Jurusan();
                       $jurusan->jurusan = $value->jurusan;
                       $jurusan->save();
                   }
               }   
        }
        return back();
    }

    
    
}
