<?php

namespace App\Http\Controllers;

use App\Models\groups;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCommunity($data)
    {
    {
        return ([
            'Result'=>groups::where('title', 'like', "%{$data}%") ->orWhere('body', 'like', "%{$data}%")->get()
        ]);
    }
}
public function mygroup(Request $request)
{
{
    return ([
        'Result'=>groups::where('admin',$request->admin)->get()
    ]);
}
}
public function allgroups(){
    return ([
        'Result'=>groups::get()
    ]);
 }
 public function groupById($id){
    return ([
        'Result'=>[groups::find($id)]
    ]);
 }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createGroup(Request $request)
    {
        $imagename = "";
        if ($request->hasFile('image')) {
            $image = $request->image;
            $image->move('GroupImage/', $image->getClientOriginalName());

            $imagename = $request->image->getClientOriginalName();
            
        }
        $group = groups::create([
            'title'=>$request->title,
            'body'=>$request->body,
            'branch'=>$request->branch,
            'year'=>$request->year,
            'image'=>$imagename,
            'admin'=>$request->admin,
          ]);
            
        if($group){
            return response([
                'result'=>"Group Created!"
            ]);
    }else{

        return response([
            'result'=>"Group Not Created!"
        ]);
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
     * @param  \App\Models\groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function show(groups $groups)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function edit(groups $groups)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\groups  $groups
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function destroy(groups $groups)
    {
        //
    }
}
