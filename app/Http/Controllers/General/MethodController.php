<?php

namespace App\Http\Controllers\General;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\General\Method;
use App\Models\General\Controller as ModelController;
use Illuminate\Database\QueryException;
use DataTables;

class MethodController extends Controller
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
        return view('System.Method.method');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            $controller = ModelController::query()
                            ->where('status', 1)
                            ->get()
                            ->pluck('name', 'id');
            $verbos = ['post' =>'POST','get' => 'GET','put' => 'PUT','patch' => 'PATCH','delete' => 'DELETE','resource' => 'RESOURCE'];
            $model = new Method();
            return view('System.Method.formMethod', compact('model','controller','verbos'));
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
            'controller_id'=>'required|integer',
            'name' => 'required|string|unique:method,name',
            'verbName'=>'required|string',
            'name_function'=>'required|string',
            'url'=>'required|string'
        ]);
        $model = Method::create($request->all());
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
        $controller = ModelController::query()
                            ->where('status', 1)
                            ->get()
                            ->pluck('name', 'id');
                            $verbos = ['post' =>'POST','get' => 'GET','put' => 'PUT','patch' => 'PATCH','delete' => 'DELETE','resource' => 'RESOURCE'];                    
        $model = Method::findOrFail($id);
        return view('System.Method.formMethod', compact('model','controller','verbos'));
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
        $this->validate($request, [
            'controller_id'=>'required',
            'name' => 'required|string',
            'verbName'=>'required|string',
            'name_function'=>'required|string',
            'url'=>'required|string'
        ]);
        $model = Method::findOrFail($id);
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
        //
    }

    public function ApiMethod(){
        $model = Method::with('controller')->orderBy('id','DESC')->get();
        return DataTables::of($model)
        ->addColumn('action', function ($model) {
            return view('layouts._action', [
                'model' => $model,
                'url_edit' => route('method.edit', $model->id),
                'url_destroy' => route('method.destroy', $model->id)
            ]);
        })
        ->editColumn('edit',function($model){
            return $model->controller->name;
        })
        ->addIndexColumn()
        ->rawColumns(['action','edit'])
        ->make(true);
    }
}
