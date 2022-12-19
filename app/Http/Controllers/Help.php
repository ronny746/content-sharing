<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Help extends Controller
{
    public function contactus(){
       
        
        return response([
            'name'=>'Pinku singh',
            'email'=>'garvitasingh936@gmail.com',
            'mobile'=>'6386037892',
            'content'=>'24*7 available',
            
        ]);
    }


    public function aboutus(){

        return response([
            'content'=>'secure conversation between teachers and students inside college campus!'
        ]);
    }
    public function privacy(){

        return response([
            'content'=>'secure conversation between teachers and students inside college campus!'
        ]);
    }
    public function termcondition(){

        return response([
            'content'=>'secure conversation between teachers and students inside college campus!'
        ]);
    }
}
