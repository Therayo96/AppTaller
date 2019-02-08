@extends('adminlte::page')

@section('title', 'Providers')

@section('content_header')
    <h1>Providers <small>provider administrator</small></h1>
@stop

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">List Providers
          <a href="{{ route('providers.create') }}" class="btn btn-success pull-right modal-show" style="margin-top: -8px;" title="Create Provider"><i class="fas fa-plus"></i> Create</a>
      </h3>
    </div>
    <div class="panel-body">
          <table id="datatable" class="table table-hover" style="width:100%">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Company</th>
                      <th>Contact</th>
                      <th>Telephone</th>
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
            ajax: "{{ route('api.providers') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'contact', name: 'contact'},
                {data: 'num_contact', name: 'num_contact'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
</script>
@stop