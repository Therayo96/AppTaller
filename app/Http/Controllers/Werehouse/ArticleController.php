<?php

namespace App\Http\Controllers\Werehouse;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Werehouse\Article;
use App\Models\werehouse\Category;
use Illuminate\Database\QueryException;
use DataTables;

class ArticleController extends Controller
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
        return view('Werehouse.Articles.articles');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            $model = new Article();
            $category = Category::query()
                            ->where('condition', 1)
                            ->get()
                            ->pluck('name', 'id');
            return view('Werehouse.Articles.formArticles', compact('model','category'));
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
            'name' => 'required|string|unique:articles,name',
            'price_sale'  => 'required|integer',
            'stock' => 'required|integer',
            'code' => 'min:8|integer'     
        ]);
        $model = Article::create($request->all());
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
        try{
            $model = Article::findOrFail($id);
            $category = Category::query()
                            ->where('condition', 1)
                            ->get()
                            ->pluck('name', 'id');
            return view('Werehouse.Articles.formArticles', compact('model','category'));
        }catch(QueryException $queryException){
            return abort(500, $queryException->getMessage());
        }
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
            'name' => 'required|string',
            'price_sale'  => 'required|integer',
            'stock' => 'required|integer',
            'code' => 'integer|min:8'      
        ]);
        $model = Article::findOrFail($id);
        $model->update($request->all());
    }

    public function deactive($id)
    {
        try{
        $model = Article::find($id); 
        $model->condition = '0';
        $model->save();
        }catch(QueryException $queryException){
            return abort(500, $queryException->getMessage());
        }
    }

    public function activate($id)
    {
        try{
        $model = Article::findOrFail($id); 
        $model->condition = '1';
        $model->save();
        }catch(QueryException $queryException){
            return abort(500, $queryException->getMessage());
        }
    }

    public function ApiArticle(){
        $model = Article::with('category')->get();
        return DataTables::of($model)
        ->editColumn('category', function ($model){
            return $model->category->name;
        })
        ->editColumn('condition',function ($model){
                return ($model->condition == 1) ? '<span class="label label-success">Active</span>':
                                                  '<span class="label label-danger">Deactive</span>';
        })
        ->addColumn('action', function ($model) {
            return view('layouts._actionDeleted', [
                'model' => $model,
                'url_edit' => route('articles.edit', $model->id),
                'url_deactive' => route('articles.deactive', $model->id),
                'url_activate' => route('articles.activate', $model->id)
            ]);
        })
        ->addIndexColumn()
        ->rawColumns(['category','action','condition'])
        ->make(true);
    }
}
