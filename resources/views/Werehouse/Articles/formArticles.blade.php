{!! Form::model($model, [
    'route' => $model->exists ? ['articles.update', $model->id] : 'articles.store',
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}
    {{csrf_field()}}  
    <div class="row">
        <div class="col-lg-12">
        
        <div class="col-lg-6 col-sm-12">
            <div class="form-group">
            {!! Form::label('name','Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 
                                'id' => 'name','placeholder'=>'name']) !!}
            </div>
            <div class="form-group">
                    {!! Form::label('stock','Stock') !!}
                    {!! Form::text('stock', null, ['class' => 'form-control', 
                                        'id' => 'stock','placeholder'=>'stock']) !!}
            </div>
            
        </div>
    
        <div class="col-lg-6 col-sm-12">
                <div class="form-group">
                        {!! Form::label('category_id','Category(*)') !!}
                        {!! Form::select('category_id', $category, null, 
                                ['class' => 'form-control',
                                'placeholder' => 'Select a category',
                                'id' => 'select'])
                        !!}
                </div>
                <div class="form-group">
                    {!! Form::label('price_sale','Price') !!}
                    {!! Form::text('price_sale', null, ['class' => 'form-control', 
                                        'id' => 'price_sale','placeholder'=>'price sale']) !!}
                </div>
        </div>
    
        <div class="col-lg-6 col-sm-12">
            <div class="form-group">
                {!! Form::label('code','Code') !!}
                <div class="input-group">
                {!! Form::text('code', null, ['class' => 'form-control', 
                                        'id' => 'code','placeholder'=>'code']) !!}
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-info btn-flat" onclick="print()"><i class="fas fa-print"></i></button>
                    </span>
                </div>
                    <div class="barcode-container">
                            <svg id="barcode"></svg>
                    </div>    
            </div>
            
            <div class="form-group">
                    {!! Form::label('description','Description') !!}
                    {!! Form::text('description', null, ['class' => 'form-control', 
                                        'id' => 'description']) !!}
            </div>
        </div>
        
        
        
    </div>
</div>
{!! Form::close() !!}