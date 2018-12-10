{!! Form::model($model, [
    'route' => $model->exists ? ['method.update', $model->id] : 'method.store',
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}
    {{csrf_field()}}  
    <div class="form-group">
        {!! Form::label('controller_id','Controller') !!}
        {!! Form::select('controller_id', $controller, null, 
                ['class' => 'form-control',
                'placeholder' => 'Select a controller',
                'id' => 'select']) 
        !!}
    </div>

    <div class="form-group">
        {!! Form::label('name','Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder'=>'controller.name']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('verbName','Verb Name') !!}
        {!! Form::select('verbName', $verbos, null, ['class' => 'form-control',
                                    'placeholder' => 'Select a verb',
                                    'id' => 'select2'
        ]) !!}
    </div>


    <div class="form-group">
        {!! Form::label('name_function','Name Function') !!}
        {!! Form::text('name_function', null, ['class' => 'form-control', 
                            'id' => 'name_function', 'placeholder'=>'index']) !!}
    </div>
    
    <div class="form-group">
        {!! Form::label('url','URL') !!}
        {!! Form::text('url', null, ['class' => 'form-control', 'id' => 'url','placeholder'=>'/url']) !!}
    </div>

{!! Form::close() !!}