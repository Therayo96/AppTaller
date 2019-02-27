@extends('adminlte::page')

@section('title', 'Income')

@section('content_header')
    <h1>Income <small>Income administrator</small></h1>
@stop

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">List Income
          <a href="{{ route('income.create') }}" class="btn btn-success pull-right btn-show create" 
             style="margin-top: -8px;" title="Create Income"><i class="fas fa-plus"></i> Create</a>
      </h3>
    </div>
    <div class="panel-body">
          <table id="datatable" class="table table-hover" style="width:100%">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>User</th>
                      <th>Nº Voucher</th>
                      <th>Total</th>
                      <th>State</th>
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
            ajax: "{{ route('api.income') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'user', name: 'iduser'},
                {data: 'num_voucher', name: 'num_voucher'},
                {data: 'total', name: 'total'},
                {data: 'state', name: 'state'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
</script>
@stop