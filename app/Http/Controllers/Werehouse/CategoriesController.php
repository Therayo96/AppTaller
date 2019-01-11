<?php

namespace App\Http\Controllers\Werehouse;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Werehouse\Category;
use Illuminate\Database\QueryException;
use DataTables;

class CategoriesController extends Controller
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
        return view('Werehouse.Categories.categories');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            
            $model = new Category();
            return view('Werehouse.Categories.formCategories', compact('model'));
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
            'name' => 'required|string|unique:categories,name'        
        ]);

        $model = Category::create($request->all());
        
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
        $model = Category::findOrFail($id);
        return view('Werehouse.Categories.formCategories', compact('model'));
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
            'name' => 'required|string|unique:categories,name'        
        ]);
        $model = Category::findOrFail($id);
        $model->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deactive($id)
    {
        try{
        $model = Category::find($id); 
        $model->condition = '0';
        $model->save();
        }catch(QueryException $queryException){
            return abort(500, $queryException->getMessage());
        }
    }

    public function activate($id)
    {
        try{
        $model = Category::findOrFail($id); 
        $model->condition = '1';
        $model->save();
        }catch(QueryException $queryException){
            return abort(500, $queryException->getMessage());
        }
    }

    public function ApiCategory(){
        $model = Category::query();
        return DataTables::of($model)
        ->editColumn('condition',function ($model){
            return ($model->condition == 1) ? '<span class="label label-success">Active</span>':
                                              '<span class="label label-danger">Deactive</span>';
        })
        
        ->addColumn('action', function ($model) {
            return view('layouts._actionDeleted', [
                'model' => $model,
                'url_edit' => route('categories.edit', $model->id),
                'url_deactive' => route('categories.deactive', $model->id),
                'url_activate' => route('categories.activate', $model->id)
            ]);
        })
        ->rawColumns(['action','condition'])
        ->addIndexColumn()
        ->make(true);
    }
}
