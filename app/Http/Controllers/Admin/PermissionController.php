<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permissions;
use DataTables;
use RealRashid\SweetAlert\Facades\Alert;
USE Caffeinated\Shinobi\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Permisos.permisos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Permission();
        return view('Admin.Users.FormUsers', compact('model'));
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
       $model = Permission::findOrFail($id);
       return view('Admin.Permisos.formPermisos', compact('model'));
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
            'email'=>'required|string',
            'password'=>'required|string'

        ]);
        $model = Permission::findOrFail($id);
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

    public function ApiPermission(){

        $model = Permission::query();
        return DataTables::of($model)
        ->addColumn('action', function($model){
            return view('layouts._action', [
                'model' => $model,
                'url_edit' => route('permission.edit', $model->id),
                'url_destroy' => route('permission.destroy', $model->id)  
            ]);
        })
        ->addIndexColumn()
        ->rawColumns(['action'])
       ->make(true);
    }
}
