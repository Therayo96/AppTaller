{!! Form::model($model, [
    'route' => $model->exists ? ['income.update', $model->id] : 'income.store',
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}
    {{csrf_field()}}  
    <div class="row">
            <div class="col-md-7">
                <div class="form-group">
                    {!! Form::label('idsupplier','Supplier(*)') !!}
                    {!! Form::select('idsupplier', $supplier, null, 
                            ['class' => 'form-control',
                            'placeholder' => 'Supplier',
                            'id' => 'select'
                    ]) !!}
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    {!! Form::label('tax','Tax(*)') !!}
                    {!! Form::text('tax', '0.00', 
                    ['class' => 'form-control', 'id' => 'tax']) !!}

                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('type_voucher','Type Voucher(*)') !!}
                    {!! Form::select('type_voucher', $type, null, 
                            ['class' => 'form-control',
                            'placeholder' => 'Type Voucher',
                            'id' => 'select'
                    ]) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('series_voucher','Serie') !!}
                    {!! Form::text('series_voucher', null, 
                    ['class' => 'form-control',
                        'placeholder' => '000x',
                        'id' => 'series_voucher']) !!}

                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('num_voucher','Nº Voucher(*)') !!}
                    {!! Form::text('num_voucher', null,
                    ['class' => 'form-control',
                    'placeholder' => '000x',
                    'id' => 'num_voucher']) !!}

                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('code','Articles') !!}
                    <div class="input-group">
                    {!! Form::text('code', null, ['class' => 'form-control', 
                                            'id' => 'code-article','placeholder'=>'Enter code articles']) !!}
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat" id="btn-modal-second"><i class="fas fa-spinner"></i></button>
                        </span>
                        {!! Form::text('articles', null, ['class' => 'form-control', 
                        'id' => 'article-name', 'readonly']) !!}  
                    </div>
                    
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    {!! Form::label('price','Price') !!}
                    {!! Form::text('price', null,
                    ['class' => 'form-control',
                    'placeholder' => '$',
                    'id' => 'price']) !!}

                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    {!! Form::label('quantity','Quantity') !!}
                    {!! Form::text('quantity', null,
                    ['class' => 'form-control',
                    'placeholder' => '0',
                    'id' => 'quantity']) !!}

                </div>
            </div>

            <div class="col-md-2">
                {!! Form::button('<i class="fa fa-plus"></i>', ['type' => 'button', 'class' => 'btn btn-block btn-success' , 'style'=>'margin-top: 2.4rem;',
                                                                'id'=>'add'] )!!}
            </div>
            
            <div class="col-md-12">
                <div class="form-group">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-sm" id="mytable">
                            <thead>
                                <tr>
                                    <th>Options</th>
                                    <th>Article</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>                                
                            </tbody>
                            <tfoot>
                                <tr style="background-color: #CEECF5;">
                                    <td colspan="4" align="right"> 
                                        <strong>Subtotal:</strong>
                                    </td>
                                </tr>
                                <tr style="background-color: #CEECF5;">
                                    <td colspan="4" align="right">
                                        <strong>Tax:</strong>
                                    </td>   
                                </tr>
                                <tr style="background-color: #CEECF5;">
                                        <td colspan="4" align="right">
                                            <strong>Total:</strong>
                                        </td>   
                                </tr>
                            </tfoot>
                         </table>
                    </div>
                </div>
            </div>
    </div>
{!! Form::close() !!}