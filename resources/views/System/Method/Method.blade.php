@extends('adminlte::page')

@section('title', 'Controller')

@section('content_header')
    <h1>Method <small>Methods administrator</small></h1>
@stop

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">List Method
          <a href="{{ route('method.create') }}" class="btn btn-success pull-right modal-show" style="margin-top: -8px;" title="Create Method"><i class="fas fa-plus"></i> Create</a>
      </h3>
    </div>
    <div class="panel-body">
          <table id="datatable" class="table table-hover" style="width:100%">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Controller</th>
                      <th>Function</th>
                      <th>Name Verb</th>
                      <th>Name</th>
                      <th>Url</th>
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
            ajax: "{{ route('api.method') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'edit', name: 'edit'},
                {data: 'name_function', name: 'name_function'},
                {data: 'verbName', name: 'verbName'},
                {data: 'name', name: 'name'},
                {data: 'url', name: 'url'},
                {data: 'action', name: 'action'}
            ],
            "order": [[ 1, 'asc' ]]
        });
</script>
@stop