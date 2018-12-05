<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\General\Controller as ModelController;
use DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class SystemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        return view('System.Controller.controller');
    }

    public function create()
    {
        $model = new ModelController();
        return view('System.Controller.formController', compact('model'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:controller,name',
            'containerName' => 'required|string',
            'prefix' => 'required|string|unique:controller,prefix'
        ]);

        $model = ModelController::create($request->all());
        
        return $model;
    }


    public function edit($id)
    {
        $model = ModelController::findOrFail($id);
        return view('System.Controller.formController', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:controller,name',
            'containerName' => 'required|string',
            'prefix' => 'required|string|unique:controller,prefix'
        ]);

        $model = ModelController::findOrFail($id);
        $model->update($request->all());
    }

    public function destroy($id)
    {
        
    }

    public function ApiController(){

        $model = ModelController::query();
        return DataTables::of($model)
        ->addColumn('action', function ($model) {
            return view('layouts._action', [
                'model' => $model,
                'url_edit' => route('controller.edit', $model->id),
                'url_destroy' => route('controller.destroy', $model->id)
            ]);
        })    
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->make(true);
    }

}
