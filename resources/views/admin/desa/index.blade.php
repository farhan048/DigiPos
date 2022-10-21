@extends('admin.layouts.app')
@section('title', 'Desa')
@section('main-content')
    <x-page-layout>
        @slot('pageTitle')Desa @endslot
        @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Desa</li>
        @endslot

        @slot('title')Data Desa @endslot
        @slot('button')           
        <button class="btn btn-outline-primary mb-3" onclick="create()"><i class="fas fa-plus"></i> Tambah Data Desa</button>
        @endslot
        @slot('table')
        <x-dataTables>
            @slot('columns')
            <th>Nama Desa</th>
            <th>Nama Kecamatan</th>
            <th>Action</th>
            @endslot
        </x-dataTables>
        @endslot
        @slot('modal')
        <div class="modal-header">
            <h4 class="modal-title">Default Modal</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="form" method="post" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id">
                <div class="form-group">
                    <label for="village">Nama Desa</label>
                    <input type="text" class="form-control" id="village" placeholder="Masukan Nama Kecamatan">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Kecamatan</label>
                    <select name="kecamatan_id" id="kecamatan_id" class="form-control" style="width: 100%;">
                        <option selected value="">--Pilih Kecamatan--</option>
                       @foreach ($kecamatan as $item)
                       <option value="{{$item->id}}">{{$item->nama_kecamatan}}</option>
                       @endforeach
                    </select>
                </div>
            </form>
          </div>      
        @endslot
    </x-page-layout>
@endsection
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    $(document).ready(function() {
        $('#kecamatan_id').select2({
    placeholder: "--Pilih Kecamatan--",
      allowClear: true
        });
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    var table = $('#datatables').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "",
        columns: [
            { data: 'DT_RowIndex', searchable: false, orderable: false},
            { data: 'Desa', name: 'nama_desa'},
            { data: 'Kecamatan', name: 'Kecamatan'},
            { data: 'action', name: 'action', searchable: false, orderable: false}
            ],
        columnDefs: [
            {
                "targets": 0,
                "className": "text-center",
            },
            {
                "targets": 1,
                "className": "text-center",
            },
            {
                "targets": 2,
                "className": "text-center",
            },
            {
                "targets": 3,
                "className": "text-center",
            },
        ]
    })
</script>
<script>
    function create(){
        submit_method = 'create';
             $('#form')[0].reset();
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string
            $('#modal_form').modal('show'); // show bootstrap modal
            $('.modal-title').text('Tambah Data Desa');
            $('#id').val('');
  
    }
        function edit(id){
            submit_method = 'edit';
            $('#form')[0].reset();
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            var url = "{{ route('desa.edit',":id") }}";
            url = url.replace(':id', id);
            
            $.get(url, function (data) {
                $('#village').val(data.data.nama_desa);
                $('#kecamatan_id').val(data.data.id_kecamatan);
                $('#id').val(data.data.id);
                $('#modal_form').modal('show');
                $('.modal-title').text('Edit Data Desa');
            });
        }
        function submit() {
            var id               = $('#id').val();
            var nama_desa        = $('#village').val();
            var id_kecamatan     = $('#kecamatan_id').val();
            $('#btnSave').text('Menyimpan...');
            $('#btnSave').attr('disabled', true);
            var pesan;

            if(submit_method == 'create') {
                pesan ='Data Desa berhasil ditambahkan';
            } else {
                pesan ='Data Desa berhasil diperbaharui';
            }

            $.ajax({
                url: "{{ route('desa.store') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    nama_desa: nama_desa,
                    id_kecamatan: id_kecamatan
                },
                success: function (data) {
                    if(data.status) {
                        $('#modal_form').modal('hide');
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: pesan,
                            showConfirmButton: false,
                            timer: 1500
                    });
                        table.draw();
                    }
                    else{
                        for (var i = 0; i < data.inputerror.length; i++) 
                        {
                            $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                            $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                        }
                    }
                    $('#btnSave').text('Simpan');
                    $('#btnSave').attr('disabled',false); //set button enable 
                }, 
                error: function(data){
                    var error_message="";
                    error_message +=" ";
                    $.each( data.responseJSON.errors, function( key, value ) {
                        error_message +=" "+value+" ";
                    });

                    error_message +=" ";
                    Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            title: 'ERROR !',
                            text: error_message,
                            showConfirmButton: false,
                            timer: 3000
                        });
                    $('#btnSave').text('Simpan');
                    $('#btnSave').attr('disabled', false);
                },
            });
        }
        function destroy(id) {
            var url = "{{ route('desa.destroy',":id") }}";
            url = url.replace(':id', id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        Swal.fire({
            title             : "Hapus Data",
            text              : "Apakah Anda yakin akan hapus data ini!?",
            icon              : "warning",
            showCancelButton  : true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor : "#d33",
            confirmButtonText : "Ya, Hapus!"
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url    : url,
                    type   : "delete",
                    data: {
                    "id":id
                    },
                    dataType: "JSON",
                    success: function(data) {
                        $('#datatables').DataTable().ajax.reload();
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: 'Data berhasil dihapus',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                })
            }
        })
    }   
</script>
@endpush