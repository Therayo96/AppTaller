{!! Form::model($model, [
    'route' => $model->exists ? ['permission.update', $model->id] : 'permission.store',
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}
    {{csrf_field()}}  
    <div class="form-group">
        {!! Form::label('name','Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('slug','Slug') !!}
        {!! Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description','Description') !!}
        {!! Form::text('description', null, ['class' => 'form-control', 'id' => 'description']) !!}
    </div>

    

{!! Form::close() !!}