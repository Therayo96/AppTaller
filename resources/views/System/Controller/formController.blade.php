{!! Form::model($model, [
    'route' => $model->exists ? ['controller.update', $model->id] : 'controller.store',
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}
    {{csrf_field()}}  
    <div class="form-group">
        {!! Form::label('name','Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('containerName','Container') !!}
        {!! Form::text('containerName', null, ['class' => 'form-control', 'id' => 'containerName']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('prefix','Prefix') !!}
        {!! Form::text('prefix', null, ['class' => 'form-control', 'id' => 'prefix']) !!}
    </div>
    
    <div class="form-group">
        {!! Form::label('status','Status') !!}
        {!! Form::select('status', ['1' => 'Visible', '0' => 'Not visible'], '1',
                ['class'=>'form-control', 'id'=>'select']); !!}
    </div>

{!! Form::close() !!}