<div class="modal" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                    <h3 class="modal-title"></h3>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="id_lpd" name="id_lpd">
                      
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Tahun</label>
                                <div class="col-md-8">
                                    <input type="text" id="tahun" name="tahun" class="form-control" >
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Kode Klasifikasi</label>
                                <div class="col-md-8">
                                    <input type="text" id="kode_klasifikasi" name="kode_klasifikasi" class="form-control" >
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">No. Surat</label>
                                <div class="col-md-8">
                                    <input type="text" id="no_surat" name="no_surat" class="form-control" >
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Uraian Informasi</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" name="uraian" id="uraian" rows="4"></textarea>
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Tujuan Surat</label>
                                <div class="col-md-8">
                                    <input type="text" id="tujuan_surat" name="tujuan_surat" class="form-control" >
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Tanggal</label>
                                <div class="col-md-8">
                                    <input type="date" id="tgl" name="tgl" class="form-control" >
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Jumlah Berkas</label>
                                <div class="col-md-8">
                                    <input type="text" id="jumlah" name="jumlah" class="form-control" >
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Folder</label>
                                <div class="col-md-8">
                                    <input type="text" id="folder" name="folder" class="form-control" >
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Boks</label>
                                <div class="col-md-8">
                                    <input type="text" id="boks" name="boks" class="form-control" >
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Rak</label>
                                <div class="col-md-8">
                                    <input type="text" id="rak" name="rak" class="form-control" >
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Keterangan</label>
                                <div class="col-md-8">
                                    <input type="text" id="ket" name="ket" class="form-control" >
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Aktif (Tahun)</label>
                                <div class="col-md-8">
                                    <input type="text" id="aktif" name="aktif" class="form-control" >
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Inaktif (Tahun)</label>
                                <div class="col-md-8">
                                    <input type="text" id="inaktif" name="inaktif" class="form-control" >
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Retensi</label>
                                <div class="col-md-8">
                                    <input type="text" id="retensi" name="retensi" class="form-control" >
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>

                            
                        <div class="col-md-4">
                        </div>
                    </div>
                </div>    

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-save">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>

            </form>

        </div>
    </div>
</div>

<!-- modal export / import data -->




