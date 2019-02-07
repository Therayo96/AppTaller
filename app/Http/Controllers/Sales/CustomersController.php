<?php

namespace App\Http\Controllers\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sales\Customer;
use DataTables;

class CustomersController extends Controller
{
    
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Sales.Customer.Customers');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            $model = new Customer();
            $type = ['CC' =>'cédula de ciudadanía','TI' => 'tarjeta de identidad','CI' => 'cédula de identidad'];
            return view('Sales.Customer.formCustomers', compact('model','type'));
        }catch(QueryException $queryException){
            return abort(500, $queryException->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'num_document' => 'string|unique:customers,num_document'
        ]);
        $model = Customer::create($request->all());
        return $model;
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = ['CC' =>'cédula de ciudadanía','TI' => 'tarjeta de identidad','CI' => 'cédula de identidad'];
        $model = Customer::findOrFail($id);
        return view('Sales.Customer.formCustomers', compact('model','type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Customer::findOrFail($id);
        $model->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Customer::findOrFail($id);
        $model->delete();
    }

    public function ApiCustomer(){
        $model = Customer::query();
        return DataTables::of($model)
        ->addColumn('action', function ($model) {
            return view('layouts._action', [
                'model' => $model,
                'url_edit' => route('customer.edit', $model->id),
                'url_destroy' => route('customer.destroy', $model->id)
            ]);
        })    
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->make(true);
    }
}
