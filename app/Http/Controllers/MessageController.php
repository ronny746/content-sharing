<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getGroupmessage($group_id)
    {
        return response([

          
            "Result"=>Message::where('group_id',$group_id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function groupMessage(Request $request)
    {
        $imagename = '';
        if ($request->hasFile('file')) {
            $image = $request->file;
            $image->move('GroupImagefile/', $image->getClientOriginalName());

            $imagename = $request->file->getClientOriginalName();
            
        }
        $user = User::find($request->user_id);
        //return $user;
        $group = Message::create([
            'message'=>$request->message,
            'user_name'=>$user->f_name,
            'user_id'=>$user->id,
            'user_profile'=>$user->profile,
            'user_branch'=>$user->branch,
            'user_role'=>$user->role,
            'user_year'=>$user->year,
            'group_id'=>$request->group_id,
            'file'=>$imagename,
          ]);
            
        if($group){
            return response([
                'result'=>"message send!"
            ]);
    }else{

        return response([
            'result'=>"message Not send!"
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
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Message $message)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Message::find($id);
        $message->delete();
        return response([
            'Result'=>"Message deleted!"
        ]);
    }
}
