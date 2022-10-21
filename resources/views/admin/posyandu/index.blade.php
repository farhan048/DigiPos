@extends('admin.layouts.app')
@section('title', 'Posyandu')
@section('main-content')
    <x-page-layout>
        @slot('pageTitle')Posyandu @endslot
        @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Posyandu</li>
        @endslot

        @slot('title')Data Posyandu @endslot
        @slot('button')           
        <button class="btn btn-outline-primary mb-3" onclick="create()"><i class="fas fa-plus"></i> Tambah Data Posyandu</button>
        @endslot
        @slot('table')
        <x-dataTables>
            @slot('columns')
            <th>RW</th>
            <th>Nama Posyandu</th>
            <th>Ketua Posyandu</th>
            <th>Desa</th>
            <th>Total Pasien</th>
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
                    <label for="posyandu">Posyandu</label>
                    <input type="text" class="form-control" id="posyandu" placeholder="Masukan Nama Posyandu">
                </div>
                <div class="form-group">
                    <label for="rw">RW</label>
                    <input type="text" class="form-control" id="rw" placeholder="Masukan Nomer RW">
                </div>
                <div class="form-group">
                    <label class="control-label">Desa</label>
                    <select name="desa_id" id="desa_id" class="form-control" style="width: 100%;">
                        <option selected value="">--Pilih desa--</option>
                       @foreach ($desa as $item)
                       <option value="{{$item->id}}">Desa {{$item->nama_desa}}</option>
                       @endforeach
                    </select>
                </div>
                  <div class="form-group">
                    <label class="control-label">puskesmas</label>
                    <select name="puskesmas_id" id="puskesmas_id" class="form-control" style="width: 100%;">
                        <option selected value="">--Pilih Puskesmas--</option>
                       @foreach ($puskesmas as $item)
                       <option value="{{$item->id}}">Puskesmas {{$item->nama_puskesmas}}</option>
                       @endforeach
                    </select>
                </div>
            </form>
          </div>      
        @endslot
    </x-page-layout>
@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var table = $('#datatables').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "",
        columns: [
            { data: 'DT_RowIndex', searchable: false, orderable: false},
            { data: 'RW', name: 'rw'},
            { data: 'Posyandu', name: 'nama_posyandu'},
            { data: 'desa', name: 'desa'},
            { data: 'action', name: 'action', searchable: false, orderable: false}
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
            $('.modal-title').text('Tambah Data Posyandu');
            $('#id').val('');
  
    }
        function edit(id){
            submit_method = 'edit';
            $('#form')[0].reset();
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            var url = "{{ route('posyandu.edit',":id") }}";
            url = url.replace(':id', id);
            
            $.get(url, function (data) {
                $('#puskesmas').val(data.data.nama_posyandu);
                $('#rw').val(data.data.rw);
                $('#id').val(data.data.id);
                $('#modal_form').modal('show');
                $('.modal-title').text('Edit Data Posyandu');
            });
        }
        function submit() {
            var id          = $('#id').val();
            var posyandu    = $('#posyandu').val();
            var rw          = $('#rw').val();
            var puskesmas   = $('#puskesmas_id').val();
            var desa        = $('#desa_id').val();
            $('#btnSave').text('Menyimpan...');
            $('#btnSave').attr('disabled', true);
            var pesan;

            if(submit_method == 'create') {
                pesan ='Data Posyandu berhasil ditambahkan';
            } else {
                pesan ='Data Posyandu berhasil diperbaharui';
            }

            $.ajax({
                url: "{{ route('posyandu.store') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    nama_posyandu: posyandu,
                    rw: rw,
                    id_puskesmas : puskesmas,
                    id_desa : desa
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
                            timer: 2000
                        });
                    $('#btnSave').text('Simpan');
                    $('#btnSave').attr('disabled', false);
                },
            });
        }
        function destroy(id) {
            var url = "{{ route('posyandu.destroy',":id") }}";
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