<a href="{{ $url_edit }}" class="btn btn-success btn-sm modal-show edit" title="Edit {{ $model->name }}"><i class="fas fa-pencil-alt "></i>
</a> 
@if($model->condition==1)
<a href="{{ $url_deactive }}" id="{{ $model->id}}" class="btn btn-danger btn-sm btn-active" title="deactivate {{ $model->name }}"><i class="fa fa-trash"></i></a>
@else
<a href="{{ $url_activate }}" id="{{ $model->id}}" class="btn btn-primary btn-sm btn-active" title="activate {{ $model->name }}"><i class="far fa-check-circle"></i></a> 
@endif

