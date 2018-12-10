@extends('adminlte::page')

@section('title', 'Controller')

@section('content_header')
    <h1>Module <small>Modules administrator</small></h1>
@stop

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">List Module
          <a href="{{ route('module.create') }}" class="btn btn-success pull-right modal-show" style="margin-top: -8px;" title="Create Module"><i class="fas fa-plus"></i> Create</a>
      </h3>
    </div>
    <div class="panel-body">
          <table id="datatable" class="table table-hover" style="width:100%">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Method</th>
                      <th>Module</th>
                      <th>Main</th>
                      <th>Orden</th>
                      <th>Text</th>
                      <th>Icon</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                  
              </tbody>
          </table>
    </div>
</div>
@stop

@section('js')
<script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });
         $('#datatable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('api.module') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'method', name: 'method'},
                {data: 'module', name: 'module'},
                {data: 'main', name: 'main'},
                {data: 'order', name: 'order'},
                {data: 'text', name: 'text'},
                {data: 'icon', name: 'icon'},
                {data: 'action', name: 'action'}
            ],
        });
</script>
@stop