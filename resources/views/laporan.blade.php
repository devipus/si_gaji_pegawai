@extends('layouts.layoutbaru')

@section('title')
 home
@endsection

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        FORM PENGGAJIAN
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
          <h3 class="box-title">Form PENGGAJIAN</h3>

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
                    <h4>Data Penggajian
                      
                        <a onclick="eximForm()" class="btn btn-primary pull-right" style="margin-top: -8px;">Download</a>

                       
                    </h4>
                </div>
                <div class="panel-body">
                    <table id="laporan-table" class="table table-striped">
                        <thead>
                            <tr>
 
                      
                                 <th>Nama Dosen</th>
                                 <th>Tanggal</th>
                                <th>Jumlah Hadir</th>
                                <th>Total Gaji Bersih</th>
                                
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>

          @include('form_laporan')
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



    table = $('#laporan-table').DataTable({
        processing: true,
        serverSide: true,
        bLengthChange: true,
        iDisplayLength: 5,
        responsive: true,

        ajax: "{{ route('api.laporan') }}",
        columns: [

         
            {
                data: 'dosen.nama',
                name: 'id_dosen'
            },
            {
                data: 'tgl',
                name: 'tgl'
            },
            {
                data: 'jml_hadir',
                name: 'jml_hadir'
            },
            
            {
                data: 'total_gaber',
                name: 'total_gaber'
            },
            
        ],
        columnDefs: [
            {
                targets: -2,
                className: 'text-right'
            }
        ]
    });

    var validator= $('#modal-form form').validator();
        validator.on('submit', function(e) {
        if (!e.isDefaultPrevented()) {
            var id = $('#id_penggajian').val();
            if (save_method == 'add') url = "{{ url('penggajian') }}";
            else url = "{{ url('penggajian') . '/' }}" + id;

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


function eximForm() {
    $('#modal-exim').modal('show');
    $('#modal-exim form')[0].reset();
}



            

</script>
@endsection
   