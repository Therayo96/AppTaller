{!! Form::model($model, [
    'route' => $model->exists ? ['users.update', $model->id] : 'users.store',
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}
    {{csrf_field()}}  
    <div class="form-group">
        {!! Form::label('name','Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email','Email') !!}
        {!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password','Password') !!}
        {!! Form::text('password', null, ['class' => 'form-control', 'id' => 'password']) !!}
    </div>

    

{!! Form::close() !!}