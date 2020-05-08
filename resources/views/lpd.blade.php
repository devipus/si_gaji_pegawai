@extends('layouts.layoutbaru')

@section('title')
 home
@endsection

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        FORM LPD
        <small>Silahkan Isi Data!</small>
      </h1>
      <ol class="breadcrumb">
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Form LPD</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
         <div class="panel-body">
                   
     <div class="">
      <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                        <h4>Data LPD
                            <a onclick="addForm()" class="btn btn-primary pull-right" style="margin-left:10px; margin-top: -8px;"><i class="fas fa-plus"></i> Add Data</a> 
                            <a href="{{ route('lpd.export') }}" class="btn btn-success pull-right" style="margin-top: -8px;"><i class="fa fa-print"></i> Unduh</a>
                            <a type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#importdata" style="margin-right:10px; margin-top: -8px;"><i class="fas fa-arrow-up"></i> Upload</a>
                            
                        </h4>
                    
                </div>
                <div class="panel-body">
                <!-- Modal -->
                    <div class="modal fade" id="importdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                                <form method="post" enctype="multipart/form-data" action="{{ route('lpd.import')}}" class="form-horizontal">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class="col-md-5">
                                            <input type="file" id="file" name="file" class="form-control" autofocus required>
                                            <span class="help-block with-errors"></span>
                                            
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-save">Upload</button>

                                    </div>
                                </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <table id="lpd-table" class="table table-striped">
                        <thead>
                            <tr>
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
                                <th>Aktif (Tahun)</th>
                                <th>Inaktif (Tahun)</th>
                                <th>Retensi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>

          @include('form_lpd')
    </div>


                </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- Content Header (Page header) -->
@endsection    

@section('script')
<script type="text/javascript">
$(document).ready(function() {



    table = $('#lpd-table').DataTable({
        scrollY: "50vh",
        scrollCollapse: true,
        scrollX: true,
        processing: true,
        serverSide: true,
        bLengthChange: true,
        iDisplayLength: 5,
        responsive: true,

        ajax: "{{ route('api.lpd') }}",
        columns: [
            {
                data: 'tahun',
                name: 'tahun'
            },
            {
                data: 'kode_klasifikasi',
                name: 'kode_klasifikasi'
            },
            {
                data: 'no_surat',
                name: 'no_surat'
            },
            {
                data: 'uraian',
                name: 'uraian'
            },
            {
                data: 'tujuan_surat',
                name: 'tujuan_surat'
            },
            {
                data: 'tgl',
                name: 'tgl'
            },
            {
                data: 'jumlah',
                name: 'jumlah'
            },
            {
                data: 'folder',
                name: 'folder'
            },
            {
                data: 'boks',
                name: 'boks'
            },
            {
                data: 'rak',
                name: 'rak'
            },
            {
                data: 'ket',
                name: 'ket'
            },
            {
                data: 'aktif',
                name: 'aktif'
            },
            {
                data: 'inaktif',
                name: 'inaktif'
            },
            {
                data: 'retensi',
                name: 'retensi'
            },
            {
                data: 'action',
                name: 'action',
                searchable: false
            }
        ]
    });

    var validator= $('#modal-form form').validator();
        validator.on('submit', function(e) {
        if (!e.isDefaultPrevented()) {
            var id = $('#id_lpd').val();
            if (save_method == 'add') url = "{{ url('lpd') }}";
            else url = "{{ url('lpd') . '/' }}" + id;

            $.ajax({ 
                url: url,
                type: "POST",
                //                        data : $('#modal-form form').serialize(),
                data: new FormData($("#modal-form form")[0]),
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.error==1){
                        var dataError = data.data;
                        $('#modal-form .help-block').html('');
                        $.each(dataError, function(e,f){
                            $('#modal-form input[name="' +f.name+ '"]').parents('.form-group').addClass('has-error');
                            $('#modal-form input[name="' +f.name+ '"]').next('.help-block').html(f.message);
                        });
                    }else
                    {


                    $('#modal-form').modal('hide');
                    table.ajax.reload();
                    swal({
                        title: 'Success!',
                        text: '',
                        type: 'success',
                        timer: '1500'
                    });

                }
                },
                error: function(data) {
                    swal({
                        title: 'Oops...',
                        text: data.message,
                        type: 'error',
                        timer: '1500'
                    })
                }
            });
            return false;
        }
    });
});

function editForm(id) {
    save_method = 'edit';
    $('input[name=_method]').val('PATCH');
    $('#modal-form form')[0].reset();
    $.ajax({
        url: "{{ url('lpd') }}" + '/' + id + "/edit",
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            console.log(data);
            $('#modal-form').modal('show');
            $('.modal-title').text('Edit Data');
         
            $('#id_lpd').val(data.id_lpd);
            $('#tahun').val(data.tahun);
            $('#kode_klasifikasi').val(data.kode_klasifikasi);
            $('#no_surat').val(data.no_surat);
            $('#uraian').val(data.uraian);
            $('#tujuan_surat').val(data.tujuan_surat);
            $('#tgl').val(data.tgl);
            $('#jumlah').val(data.jumlah);
            $('#folder').val(data.folder);
            $('#boks').val(data.boks);
            $('#rak').val(data.rak);
            $('#ket').val(data.ket);
            $('#aktif').val(data.aktif);
            $('#inaktif').val(data.inaktif);
            $('#retensi').val(data.retensi);

        },
        error: function() {
            alert("Nothing Data");
        }
    });
}



function addForm() {
      save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Add Data');

}


function deleteData(id) {
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    swal({
        title: 'Yakin ?',
        text: "Data ini akan dihapus!",
        type: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!'
    }).then(function() {
        $.ajax({
            url: "{{ url('lpd') }}" + '/' + id,
            type: "POST",
            data: {
                '_method': 'DELETE',
                '_token': csrf_token
            },
            success: function(data) {
                if (data.success == 1) {
                    table.ajax.reload();
                    swal({
                        title: 'Success!',
                        text: '',
                        type: 'success',
                        timer: '1500'
                    });
                } else {
                    var error = data.error;
                    if (error && error.length > 0) {
                        $.each(data.errors, function(a, b) {
                            $("[name='" + a + "']").parents('.');

                        });
                    } else {
                        swal({
                            title: 'Oops...',
                            text: data.message,
                            type: 'error',
                            timer: '1500'
                        });
                    }
                }
            },
            error: function() {
                swal({
                    title: 'Oops...',
                    text: data.message,
                    type: 'error',
                    timer: '1500'
                })
            }
        });
    });

}
           

</script>
@endsection
