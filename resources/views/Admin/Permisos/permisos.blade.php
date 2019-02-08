@extends('adminlte::page')

@section('title', 'Permissions')

@section('content_header')
    <h1>Permissions <small>controls permissions </small></h1>
@stop

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">List Permissions
          <a href="{{ route('permission.create') }}" class="btn btn-success pull-right modal-show" style="margin-top: -8px;" title="Create Permissions"><i class="fas fa-plus"></i> Create</a>
      </h3>
    </div>
    <div class="panel-body">
          <table id="datatable" class="table table-hover" style="width:100%">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Description</th>
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
         })
         
         $('#datatable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('api.permission') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                 {data:'name', name: 'name'},
                 {data: 'slug', name: 'slug' },
                 {data: 'description', name: 'description' },
                 {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            "order": [[ 1, 'asc' ]]
        });
</script>
@stop