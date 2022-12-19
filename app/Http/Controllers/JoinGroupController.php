<?php

namespace App\Http\Controllers;

use App\Models\joinGroup;
use Illuminate\Http\Request;

use App\Models\groups;
use App\Http\Controllers\GroupsController;

class JoinGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function joinGroup(Request $request)
    {
        $join = joinGroup::create([
            'user_id'=>$request->user_id,
            'group_id'=>$request->group_id,
          ]);

          if($join){
            return response([
                'result'=>"Joining Success!"
            ]);
    }else{

        return response([
            'result'=>"Faild!"
        ]);
    }
    }
    public function joinMyGroup(Request $request)
    {
        //$groupId = joinGroup::where('user_id',$request->user_id)->get('group_id');
        
        return ([
            'Result'=>joinGroup::where('user_id',$request->user_id)->get('group_id')
        ]);
      
         
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
     * @param  \App\Models\joinGroup  $joinGroup
     * @return \Illuminate\Http\Response
     */
    public function show(joinGroup $joinGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\joinGroup  $joinGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(joinGroup $joinGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\joinGroup  $joinGroup
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, joinGroup $joinGroup)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\joinGroup  $joinGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(joinGroup $joinGroup)
    {
        //
    }
}
