{!! Form::model($model, [
    'route' => $model->exists ? ['providers.update', $model->id] : 'providers.store',
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}
    {{csrf_field()}}  
    <div class="row">
        <div class="col-lg-12">
                <div class="form-group">
                        {!! Form::label('name','Name') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
                    </div>
                
                    <div class="col-lg-4 col-sm-4">
                        <div class="form-group">
                            {!! Form::label('type_document','Type Document') !!}
                            {!! Form::select('type_document', $type, null, 
                                    ['class' => 'form-control',
                                    'placeholder' => 'type document',
                                    'id' => 'select'
                            ]) !!}
                        </div>
                    </div>
                    <div class="col-lg-8 col-sm-8">        
                        <div class="form-group">
                            {!! Form::label('num_document','Document Number') !!}
                            {!! Form::text('num_document', null, ['class' => 'form-control', 'id' => 'num_document']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('address','Address') !!}
                        {!! Form::text('address', null, ['class' => 'form-control', 'id' => 'Address']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('telephone','Telephone') !!}
                        {!! Form::text('telephone', null, ['class' => 'form-control', 'id' => 'telephone']) !!}
                    </div>
                
                    <div class="form-group">
                        {!! Form::label('email','Email') !!}
                        {!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) !!}
                    </div>
                    
                    <div class="col-lg-4 col-sm-4">
                    <div class="form-group">
                        {!! Form::label('contact','Name of Contact') !!}
                        {!! Form::text('contact', null, ['class' => 'form-control', 'id' => 'contact']) !!}
                    </div>
                    </div>
                    <div class="col-lg-8 col-sm-8">        
                    <div class="form-group">
                        {!! Form::label('num_contact','Number of Contact') !!}
                        {!! Form::text('num_contact', null, ['class' => 'form-control', 'id' => 'num_contact']) !!}
                    </div>
                    </div>
        </div>          
    </div>
    
    
    
{!! Form::close() !!}