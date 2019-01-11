{!! Form::model($model, [
    'route' => $model->exists ? ['categories.update', $model->id] : 'categories.store',
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}
    {{csrf_field()}}  
    <div class="form-group">
        {!! Form::label('name','Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder'=>'Name']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description','Description') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control', 
                            'id' => 'description']) !!}
    </div>

{!! Form::close() !!}