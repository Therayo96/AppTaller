<div class="modal fade" id="ModalAgregarNombre" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog"  role="document">
        <div class="modal-content">
            <div class="modal-header  bg-primary" id="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-title">Form Input</h4>
            </div>

            <div class="modal-body" id="modal-body">
                    
                <div class="form-group row"> 
                    <div class="col-md-6">
                            <div class="input-group">
                                    {!! Form::text('code', null, ['class' => 'form-control', 
                                                            'id' => 'search-article','placeholder'=>'Enter name articles']) !!}
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-info btn-flat" id="btn-search"><i class="fas fa-search"></i> Search</button>
                                        </span>
                            </div>
                    </div>    
                </div>                
                
                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-sm" id="table-modal">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Category</th>
                                                <th>Code</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Stock</th>
                                                <th>Condition</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                
                                        </tbody>
                                     </table>
                                </div>
            </div>
            
            <div class="modal-footer" id="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>