<?php

namespace App\Http\Controllers\Purchases;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Purchases\Supplier;
Use DataTables;

class SupplierController extends Controller
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
        return view('Purchases.Supplier.Supplier');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            $model = new Supplier();
            $type = ['NIT' =>'Nit','RUT' => 'Rut'];
            return view('Purchases.Supplier.FormSupplier', compact('model','type'));
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
            'num_document' => 'string|unique:supplier,num_document'
        ]);
        $model = Supplier::create($request->all());
        return $model;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $type = ['NIT' =>'Nit','RUT' => 'Rut'];
            $model = Supplier::findOrFail($id);
            return view('Purchases.Supplier.FormSupplier', compact('model','type'));
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
        $model = Supplier::findOrFail($id);
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
        $model = Supplier::findOrFail($id);
        $model->delete();
    }

    public function ApiSupplier(){
        $model = Supplier::query();
        return DataTables::of($model)
        ->addColumn('action', function ($model) {
            return view('layouts._action', [
                'model' => $model,
                'url_edit' => route('supplier.edit', $model->id),
                'url_destroy' => route('supplier.destroy', $model->id)
            ]);
        })    
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->make(true);
    }
}
