<div class="table-responsive">
        <table class="table table-striped table-hover">
                <tr>
                    <th>ID</th>
                    <th>Supplier</th>
                    <th>User</th>
                    <th>Type Voucher</th>
                    <th>Serie Voucher</th>
                    <th>Nº Voucher</th>
                    <th>Date</th>
                    <th>Tax</th>
                    <th>Total</th>
                    <th>State</th>
                </tr>
                <tr>
                    <td>{{ $model->id }}</td>
                    <td><span class="label label-primary">{{ $model->supplier->name }} </span></td>
                    <td><span class="label label-info">{{ $model->users->name }}</span></td>    
                    <td>{{ $model->type_voucher }}</td>
                    <td>{{ $model->series_voucher }}</td>
                    <td>{{ $model->num_voucher }}</td>
                    <td>{{ $model->date_hour }}</td>
                    <td>{{ $model->tax }}</td>
                    <td>{{ $model->total }}</td>
                    @if ($model->state == 'registered')
                    <td><span class="label label-success">{{ $model->state }}</span></td>
                    @else
                    <td><span class="label label-danger">{{ $model->state }}</span></td>
                    @endif
                    
                </tr>
            </table>
</div>           
