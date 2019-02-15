<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    
    public function index()
    {
        return view('Admin.Users.users');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new User();
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
         
        $this->validate($request, [
            
            'name' => 'required|string|',
            'email'=>'required|string',
            'password'=>'required|string',
            
        ]);
        $model = User::create($request->all());
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
                          
       $model = User::findOrFail($id);
        return view('Admin.Users.FormUsers', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requst
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
            $model = User::findOrFail($id);
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
    public function ApiUsers(){

        $model = User::query();
        return DataTables::of($model)
        ->addColumn('action', function($model){
            return view('layouts._action', [
                'model' => $model,
                'url_edit' => route('users.edit', $model->id),
                'url_destroy' => route('users.destroy', $model->id)  
            ]);
        })
        ->addIndexColumn()
        ->rawColumns(['action'])
       ->make(true);
    }

}
