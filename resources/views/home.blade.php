@extends('adminlte::page')

@section('title', 'ShopApp')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>You are logged in!</p>
    <button type="button" class="btn btn-block btn-primary">Primary</button>
@stop

@section('js')
<script type="text/javascript">
$(document).ready(function(){
    $("button").click(function(){
        swal({
  type: 'error',
  title: 'Oops...',
  text: 'Something went wrong!',
  footer: '<a href>Why do I have this issue?</a>'
})
    });
});
</script>

@endsection