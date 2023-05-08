<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Models\yourRequest;
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
    public function sendRequest(Request $request)
    {
       
        //return $user;
        $group = yourRequest::create([
            'user_id'=>$request->user_id,
             'title'=>$request->title,
             'token'=>$request->token,
             'status'=>"false"
          ]);
            
        if($group){
            return response([
                'result'=>"Request send!"
            ]);
    }else{

        return response([
            'result'=>"Request Not send!"
        ]);
    }
    }
    public function getRequest()
    {
       
        $r = yourRequest::get();

        return response([
            'result'=>$r
        ]);
       
    }
    public function updateRequest(Request $request){
        //return $request;
           
        
         $re= yourRequest::where(['title'=>$request->title])->first();
        
         if($re!=null){
             $re->title=$request->title;
             $re->token=$request->token;
             $re->user_id=$request->user_id;
             $re->status=$request->status;
           
    
             $re->save();
    
             return response([
                 'result'=>$re
             ]);
             
         }else{
    
             return ["Result"=>"Something Wrong please try again."];
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
    public function deletRequest($id)
    {
        $message = yourRequest::find($id);
        $message->delete();
        return response([
            'Result'=>"Request deleted!"
        ]);
    }
}
