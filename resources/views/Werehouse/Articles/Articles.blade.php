@extends('adminlte::page')

@section('title', 'Articles')

@section('content_header')
    <h1>Articles <small>article administrator</small></h1>
@stop

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">List Articles
          <a href="{{ route('articles.create') }}" class="btn btn-success pull-right modal-show" style="margin-top: -8px;" title="Create Article"><i class="fas fa-plus"></i> Create</a>
      </h3>
    </div>
    <div class="panel-body">
          <table id="datatable" class="table table-hover" style="width:100%">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Category</th>
                      <th>Code</th>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Stock</th>
                      <th>Condition</th>
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
            ajax: "{{ route('api.article') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'category', name: 'category'},
                {data: 'code', name: 'code'},
                {data: 'name', name: 'name'},
                {data: 'price_sale', name: 'price'},
                {data: 'stock', name: 'stock'},
                {data: 'condition', name: 'condition'},
                {data: 'action', name: 'action'},
            ],
        });
        
</script>
@stop