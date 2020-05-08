<div class="modal" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form-contact" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                    <h3 class="modal-title"></h3>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="id_mengajar" name="id">
                      
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Dosen</label>
                                <div class="col-md-8">
                                    <select id="id_dosen" name="id_dosen">
                                        <option value="id_dosen">--Pilih Dosen--</option>
                                        <?php 
                                                    // dosen dari model sebelah kiri
                                            foreach ($dosen as $key => $value) {
                                                                    // field id dosen di ambil dari field nama pada dosen
                                                echo '<option value="'.$value->id_dosen.'">'.$value->nama.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Mata Kuliah</label>
                                <div class="col-md-8">
                                    <select id="kd_matkul" name="kd_matkul">
                                        <option value="kd_matkul">--Pilih Mata Kuliah--</option>
                                        <?php 
                                                    // matkul dari model
                                            foreach ($matkul as $key => $value) {
                                                                // field kd matkul di ambil dari field matkul dari tb matkul
                                                echo '<option value="'.$value->kd_matkul.'">'.$value->matkul.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Semester</label>
                                    <div class="col-md-8">
                                        <input type="text" id="semester" name="semester" class="form-control" >
                                        <span class="help-block with-errors"></span>
                                    </div>
                                </div>
                        </div>

                        <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Jurusan</label>
                                    <div class="col-md-8">
                                         <select id="id_jurusan" name="id_jurusan">
                                            <option value="id_jurusan">--Pilih Jurusan</option>
                                            <?php 
                                                foreach ($jurusan as $key => $value) {
                                                    echo '<option value="'.$value->id_jurusan.'">'.$value->jurusan.'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Kelas</label>
                                    <div class="col-md-8">
                                         <select id="id_kelas" name="id_kelas">
                                            <option value="id_kelas">--Pilih Kelas</option>
                                            <?php 
                                                foreach ($kelas as $key => $value) {
                                                    echo '<option value="'.$value->id_kelas.'">'.$value->kelas.'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                        </div>

                        <div class="col-md-4">
                        </div>
                    </div>
                </div>    

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-save">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>

            </form>

        </div>
    </div>
</div>



