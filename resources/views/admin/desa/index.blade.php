@extends('admin.layouts.app')
@section('title', 'Desa')
@push('css')
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
@endpush
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
            <th>Address</th>
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
                    <input type="text" class="form-control" id="village" placeholder="Masukan Nama Desa">
                </div>
                <div class="form-group">
                    <label>Kecamatan</label>
                    <select class="form-control select2" style="width: 100%;">
                      <option selected="selected">Alabama</option>
                      <option>Alaska</option>
                      <option>California</option>
                      <option>Delaware</option>
                      <option>Tennessee</option>
                      <option>Texas</option>
                      <option>Washington</option>
                    </select>
                  </div>
            </form>
          </div>      
        @endslot
    </x-page-layout>
@endsection
@push('js')
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.select2').select2()
    var table = $('#datatables').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "",
        columns: [
            { data: 'DT_RowIndex', searchable: false, orderable: false},
            { data: 'client_name', name: 'client_name'},
            { data: 'action', name: 'action', searchable: false, orderable: false}
            
            ]
    })
</script>
<script>
    function create(){
        submit_method = 'create';
            // $('#form')[0].reset();
            // $('.form-group').removeClass('has-error'); // clear error class
            // $('.help-block').empty(); // clear error string
            $('#modal_form').modal('show'); // show bootstrap modal
            $('.modal-title').text('Tambah Data Desa');
            $('#id').val('');
  
    }
    
</script>
@endpush