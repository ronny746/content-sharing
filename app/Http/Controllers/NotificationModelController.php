<?php

namespace App\Http\Controllers;

use App\Models\NotificationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;


class NotificationModelController extends Controller
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
    public function notifyuser(Request $request)
    {
        
     
        //return $user;
        $notification = NotificationModel::create([
            'title'=>$request->title,
            'descr'=>$request->desc,
            'group_id'=>$request->group_id,
            'public'=>$request->public,
           
          ]);
         
            
       

        return response([
            'result'=>$notification
        ]);
    
    }
    public function getallNotification()
    {
        
     
        //return $user;
        $notification = NotificationModel::get();
         
            
       

        return response([
            'result'=>$notification
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
     * @param  \App\Models\NotificationModel  $notificationModel
     * @return \Illuminate\Http\Response
     */
    public function show(NotificationModel $notificationModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NotificationModel  $notificationModel
     * @return \Illuminate\Http\Response
     */
    public function edit(NotificationModel $notificationModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NotificationModel  $notificationModel
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NotificationModel  $notificationModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(NotificationModel $notificationModel)
    {
        //
    }
}
