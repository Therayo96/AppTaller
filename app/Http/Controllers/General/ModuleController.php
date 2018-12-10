<?php

namespace App\Http\Controllers\General;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\General\Module;
use App\Models\General\Method;
use Illuminate\Database\QueryException;
use DataTables;


class ModuleController extends Controller
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
        return view('System.Module.module');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            $method= Method::query()
                            ->where('name_function', 'index')
                            ->get()
                            ->pluck('name', 'id');
            $module = Module::query()
                            ->where('main', 1)
                            ->get()
                            ->pluck('text', 'id');
            $model = new Module();
            return view('System.Module.formModule', compact('model','method','module'));
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
            'order' => 'required|integer',
            'text'=>'required|string',
            'icon'=>'required|string',

        ]);
        $model = Module::create($request->all());
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
        $method= Method::query()
                            ->where('name_function', 'index')
                            ->get()
                            ->pluck('name', 'id');
        $module = Module::query()
                            ->where('main', 1)
                            ->get()
                            ->pluck('text', 'id');
        $model = Module::findOrFail($id);
        return view('System.Module.formModule', compact('model','method','module'));
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
            'order' => 'required|integer',
            'text'=>'required|string',
            'icon'=>'required|string',

        ]);
        $model = Module::findOrFail($id);
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

    public function ApiModule(){
        $model = Module::with('method','module')->orderBy('id','DESC')->get();
        return DataTables::of($model)
        ->editColumn('method',function($model){
            return is_null($model->method) ? '' : $model->method->name;
        })
        ->editColumn('module',function($model){
            return is_null($model->module) ? '' : $model->module->text;
        })
        ->editColumn('main', function($model){
            return ($model->main == 1) ? 'main' : 'submenu';
        })
        ->addColumn('action', function ($model) {
            return view('layouts._action', [
                'model' => $model,
                'url_edit' => route('module.edit', $model->id),
                'url_destroy' => route('module.destroy', $model->id)
            ]);
        })
        ->addIndexColumn()
        ->rawColumns(['method','module','main','action'])
        ->make(true);
    }
}
