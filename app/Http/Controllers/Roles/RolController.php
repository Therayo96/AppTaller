<?php

namespace App\Http\Controllers\Roles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Roles;
use DataTables;
use RealRashid\SweetAlert\Facades\Alert;
USE Caffeinated\Shinobi\Models\Role;
class RolController extends Controller
{
   
    public function index()
    {
        return view('Admin.Roles.roles');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $model = new Role();
        return view('Admin.Roles.formRoles', compact('model'));
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
        $model = Roles::findOrFail($id);
        return view('Admin.Roles.formRoles', compact('model'));
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
            'slug'=>'required|string',
            'description'=>'required|string'
        

        ]);
        $model = Role::findOrFail($id);
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

    public function apiRoles(){

        $model = Role::query();
        return DataTables::of($model)
        ->addColumn('action', function($model){
            return view('layouts._action', [
                'model' => $model,
                'url_edit' => route('roles.edit', $model->id),
                'url_destroy' => route('roles.destroy', $model->id)  
            ]);
        })
        ->addIndexColumn()
        ->rawColumns(['action'])
       ->make(true);
}

}
