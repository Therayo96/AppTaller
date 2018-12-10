{!! Form::model($model, [
    'route' => $model->exists ? ['module.update', $model->id] : 'module.store',
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}
    {{csrf_field()}}  
    <div class="form-group">
        {!! Form::label('method_id','Method') !!}
        {!! Form::select('method_id', $method, null, 
                ['class' => 'form-control',
                'placeholder' => 'Select a method',
                'id' => 'select']) 
        !!}
    </div>

    <div class="form-group">
        {!! Form::label('module_id','Module') !!}
        {!! Form::select('module_id', $module, null, 
                ['class' => 'form-control',
                'placeholder' => 'Select a module',
                'id' => 'select2']) 
        !!}
    </div>

    <div class="form-group">
        {!! Form::label('main','Main') !!}
        {!! Form::select('main', ['1' => 'Main', '0' => 'Submenu'], '1',
                ['class'=>'form-control', 'id'=>'select3']); !!}
    </div>

    <div class="form-group">
        {!! Form::label('order','Order') !!}
        {!! Form::text('order', null, ['class' => 'form-control', 'id' => 'order', 'placeholder'=>'1']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('text','Text') !!}
        {!! Form::text('text', null, ['class' => 'form-control', 
                            'id' => 'text', 'placeholder'=>'name of the module']) !!}
    </div>
    
    <div class="form-group">
        {!! Form::label('icon','Icon') !!}
        {!! Form::text('icon', null, ['class' => 'form-control', 
                            'id' => 'icon','placeholder'=>'name of the icon without fa-']) !!}
    </div>

{!! Form::close() !!}