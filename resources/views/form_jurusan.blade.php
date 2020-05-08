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
                    <input type="hidden" id="id_jurusan" name="id">
                      
                    <div class="row">
                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Jurusan</label>
                                <div class="col-md-8">
                                    <input type="text" id="jurusan" name="jurusan" class="form-control" >
                                    <span class="help-block with-errors"></span>
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

<div class="modal" id="modal-exim" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form  method="POST" action="" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                {{ csrf_field() }} 

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                    <h3 class="modal-title">Expor/Import Data</h3>
                </div>

                <div class="modal-body">
                            <div class="form-group">
                                <label for="export" class="col-md-4 control-label">Export</label>
                                <div class="col-md-8">
                                    <a href="#" class="btn btn-success">Export</a>
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="file" class="col-md-4 control-label">Import</label>
                                <div class="col-md-8">
                                    <input type="file" id="file" name="file" class="form-control" >
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>

                            
                        <div class="col-md-4">
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



