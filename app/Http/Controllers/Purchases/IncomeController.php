<?php

namespace App\Http\Controllers\Purchases;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Purchases\Income;
use App\Models\Purchases\Supplier;
use DataTables;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Purchases.Income.income');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            $model = new Income();
            $supplier = Supplier::pluck('name','id');
            $type = ['1'=>'Ticket','2'=>'Receipt','3'=>'Invoicing'];
            return view('Purchases.Income.FormIncome', compact('model','supplier','type'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Income::with('users','supplier')->find($id);
        return view('Purchases.Income.Show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function ApiIncome(){
        $model = Income::query();
        return DataTables::of($model)
        ->addColumn('action', function ($model) {
            return view('layouts._actionShow', [
                'model' => $model,
                'url_show' => route('income.show', $model->id), 
                'url_edit' => route('income.edit', $model->id),
                'url_destroy' => route('income.destroy', $model->id)
            ]);
        })
        ->editColumn('user', function ($model){
            return '<span class="label label-info">'. $model->users->name .'</span>';
        })
        ->editColumn('state',function ($model){
            return ($model->state == 'registered') ? 
                                        '<span class="label label-success">'.$model->state.'</span>':
                                        '<span class="label label-danger">'.$model->state.'</span>';
        })
        ->addIndexColumn()
        ->rawColumns(['action','user','state'])
        ->make(true);
    }
}
